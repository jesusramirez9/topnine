<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{


   public function index()
   {
     
      // session()->flash('flash.bannerStyle', 'danger');

      if (auth()->user()) {
         $pendiente = Order::where('status',1)->where('user_id', auth()->user()->id)->count();

         if ($pendiente) {
            $mensaje = "Usted tiene $pendiente ordenes pendientes. <a class='font-bold' href='".route('orders.index') ."?status=1'>Ir a pagar</a>";
            session()->flash('flash.banner', $mensaje);
         }
    
      }

       $categories = Category::all();
       $products = Product::paginate(6);
       
       $subcategories = Subcategory::all();
       $banners = Slider::where([['type', '1'], ['status', '1']])->orderBy('order', 'asc')->get();
       $offerProducts = Product::where([['inOffer', '2'], ['status', '2']])->inRandomOrder()->limit(10)->get();
    $imgslider = [
      
      'slider6.jpg'
   ];
    return view('welcome', compact('categories', 'products','imgslider','subcategories','banners','offerProducts'));


   }
}
