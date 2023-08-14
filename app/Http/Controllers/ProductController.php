<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Shopping;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        
        $product = Product::all();
        $manshoes=Category::where("type","Giay nam")
        ->join("products","id_category","=","categories.id")
        ->count();
        $girlshoes=Category::where("type","Giay nu")
        ->join("products","id_category","=","categories.id")
        ->count();
        $runshoes=Category::where("type","Giay chay")
        ->join("products","id_category","=","categories.id")
        ->count();
        $footballshoes=Category::where("type","Giay bong da")
        ->join("products","id_category","=","categories.id")
        ->count();
        $volleballshoes=Category::where("type","Giay bong ro")
        ->join("products","id_category","=","categories.id")
        ->count();
        return view("Home.Pages.productPage", ['product' => $product,"manshoes"=>$manshoes,
        "girlshoes"=>$girlshoes,"runshoes"=>$runshoes,"footballshoes"=>$footballshoes,
        "volleballshoes"=>$volleballshoes]);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function addToCard($id)
    {
        $user=intval(Auth::id());
        $toCard=Product::findOrFail($id);
        $shopping=Shopping::where("id_product",$toCard->id)
        ->where("id_user",$user)
        ->first();
       
        if ($shopping) {
            $shopping->quantity+=1;
        }
        else{
            $shopping=new Shopping();
            $shopping->id_product=$toCard->id;
            $shopping->id_user=$user;
            $shopping->quantity="1";
        }
        $shopping->save();
        return redirect()->route("index");
    }
    public function producHome()
    {
        $product = Product::all();
       return response()->json($product);
    }




    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            // $extention=$request->file_upload->extension();
            $fileName = $file->getClientOriginalName();
            $newFileName = Str::slug(pathinfo($fileName, PATHINFO_FILENAME));
            $file->move(public_path("image"), $newFileName . ".png");
        }
        $request->merge(['image' => $newFileName]);
        if (Product::create([

            "id_category" => $request->input('id_category'),
           "title"=> $request->title,
           "image"=> $request->image,
           "price_new"=> $request->price_new,
           "price_old"=> $request->price_old,
           "brand"=> $request->brand
            ]
            )) {
            return redirect()->route("Adminshow");
        }
    }
    public function addProduct(){
        return view("Home.Pages.add-product");
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
         $product = Product::findOrFail($id);

        $user_comment=Comment::where("id_product",$id)
        ->join("users","comments.id_user","=","users.id")
        ->select("users.fullname","comments.text","comments.rating")
        ->get();
        $rating=Comment::whereNotNull('rating')
        ->where("id_product",$id)
        ->get();
        $ratingCount=$rating->count();
        $ratingSum=$rating->sum("rating");
        $sumRating=($ratingCount != 0) ? ($ratingSum / $ratingCount) : 0;
        return view("Home.Pages.detail-product", ['product' => $product,"user_comment"=>$user_comment,"sumRating"=>$sumRating]);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete($request->all());
        return redirect()->route('Adminshow');
    }
    public function Increment($id){ 
        $product = Shopping::findOrFail($id);
        $quantity=$product->quantity;
        $product->quantity = $quantity + 1;
        $product->save();
        return redirect()->back();
    }
    public function Decrement($id){
        $product = Shopping::findOrFail($id);
        $quantity=$product->quantity;
        $product->quantity = $quantity-1;
        $product->save();
        return redirect()->back();
    }
}
