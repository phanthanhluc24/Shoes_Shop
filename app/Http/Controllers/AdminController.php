<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prduct = Product::all();
        return view("Home.Pages.show-product", ["product" => $prduct]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Home.Pages.edit-product', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            $fileName = $file->getClientOriginalName();
            $newFileName = Str::slug(pathinfo($fileName, PATHINFO_FILENAME));
            $file->move(public_path("image"), $newFileName . ".png");
            $request->merge(['image' => $newFileName]);
            $product->update($request->all());
        } else {
            $product->id_category = $request->id_category;
            $product->title = $request->title;
            // $product->image = $request->image;
            $product->price_new = $request->price_new;
            $product->price_old = $request->price_old;
            $product->brand = $request->brand;
            $product->save();
        }
        return redirect()->route("Adminshow");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
