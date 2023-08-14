<?php

namespace App\Providers;

use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer("Home.Layout.headerProduct",function($view){
            $id_user=intval(Auth::id());
            $cart=Shopping::where("id_user",$id_user)
            ->join("users","shoppings.id_user","=","users.id")
            ->count();
           

            $product=Shopping::where("id_user",$id_user)
            ->join("users","shoppings.id_user","=","users.id")
            ->join("products","shoppings.id_product","=","products.id")
            ->get();
            $view->with(["cart"=>$cart,"product"=>$product]);
        });
    }
}
