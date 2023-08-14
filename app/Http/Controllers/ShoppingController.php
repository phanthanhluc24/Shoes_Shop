<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id=intval(Auth::id());
        $order = Product::select('shoppings.id','shoppings.quantity','products.title', "products.image", "products.price_new")
            ->join("shoppings", "shoppings.id_product", "=", "products.id")
            ->where("id_user",$id)
            ->get();
            $sum=0;
            foreach($order as $item){
                $sum += $item->quantity * $item->price_new;
            };
            return view("Home.Pages.user-shopping", [
                'order' => $order,
                "sum" => $sum
            ]);
           
        }
       

    /**
     * Show the form for creating a new resource.
     */
    public function storeDetal(Request $request)
    {
        $request->validate([
            "text"=>"required",
            "rating"=>"nullable",
        ]);
        $text=$request->text;
        $rating=$request->rating;
        $id_product=$request->id_product;
        $id=intval(Auth::id());
        $comment=new Comment();
        $comment->id_user = $id;
        $comment->id_product = $id_product;
        $comment->rating=$rating;
        $comment->text = $text;
        $comment->save();
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $id_user = Auth::user()->id;
        // $id_product = $request->id_product;
        // $soluong = $request->soluong;
        // $getInfor = DB::table("products")->where("id", "$id_product")->first();
        // $gia = $getInfor->Price;
        // $sum = $soluong * $getInfor->Price;
        // DB::table('shoppings')->insert([
        //     "ID_product" => $id_product,
        //     "ID_user" => $id_user,
        //     "Soluong" => $soluong,
        //     "Gia" => $gia,
        //     "Thanh_tien" => $sum
        // ]);

        // return redirect()->route("order");
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Shopping::truncate();
        return redirect()->route('user-shopping');
    }
    public function delete(Request $request, $id){
        $cart=Shopping::FindOrFail($id);
        $cart->delete($request->all());
        return redirect()->route('user-shopping');
    }
}
