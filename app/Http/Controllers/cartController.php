<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\myCart;
use Auth;
use Session;    
class cartController extends Controller
{
    //
    PUBLIC FUNCTION __constract(){
        $this->middleware('auth');
    }
 
    public function add(){
        $r= request();
        $addItem=myCart::create([
            'quantity'=>$r->quantity,
            'orderID'=>'',
            'productID'=>$r->id,
            'userID'=>Auth::id(),

        ]);
        return redirect()->route('viewProduct');
    }
    public function view(){

        $carts=DB::table('my_carts')

        ->leftjoin('products','products.id','=','my_carts.productID')

        ->select('my_carts.quantity as cartQty','my_carts.id as cid','products.*')

        ->where('my_carts.orderID','=','') //the item haven't make payment

        ->where('my_carts.userID','=',Auth::id())

        //->get();
        ->paginate(1);
        //select my_carts.quantity as cartQty,my_carts.id as cid, products.* from my_carts left join products on products.id=my_carts.productID where my_cart.orderID='' and my_carts.userID='Auth::id()'    
        $this->cartItem();
        Return view('myCart')->with('products',$carts);

    }
    public function cartItem(){
        $noItem=DB::table('my_carts')
        ->leftjoin('products','products.id','=','my_carts.productID')
        ->select(DB::raw('COUNT(*)as count_item'))
        ->where('my_carts.orderID','=','')
        ->where('my_carts.userID','=',AUTH::id())
        ->groupBy('my_carts.userID')
        ->first();
        $cartItem=$noItem->count_item;
        Session()->put('cartItem',$cartItem);
    }
}
