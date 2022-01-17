<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
     public function add(){
        $r=request();
        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();

        $addProduct=Product::create([

            'name'=>$r->productName,
            'description'=>$r->productDescription,
            'price'=>$r->productPrice,
            'image'=>$imageName,
            'quantity'=>$r->productQuantity,
            'CategoryID'=>$r->categoryID,
  ]);
       
        return redirect()->route('viewProduct');
    }
    public function view(){
        $viewProduct=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.CategoryID') 
        ->select('products.*','categories.name as catName')
        ->get();
        return view('showProduct')->with('products',$viewProduct);

    }
   
    public function edit($id){

        $products=Product::all()->where('id',$id);

        return view('editProduct')->with('products',$products)

                                ->with('categories',Category::all());

    }
 
public function update(){
    $r=request();
    $products =Product::find($r->id); 
    if($r->file('productImage')!=''){
        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        $products->image=$imageName;
    }

    $products->categoryID = $r->categoryID;
    $products->name=$r->productName;
    $products->quantity=$r->productQuantity;
    $products->price=$r->productPrice;
    $products->description=$r->productDescription;
    $products->save();

    Session::flash('success', "Product update successfully!");
    return redirect()->route('viewProduct');
}

public function delete($id){
    $deleteProducts=Product::find($id);
    $deleteProducts->delete();
    Session::flash('success',"Product delete succesfully!");
    return redirect()->route('viewProduct');
}
public function productdetail($id){
    $products=Product::all()->where('id',$id);
    return view('productDetail')->with('products',$products);

}

public function allProduct(){
    $products=Product::paginate(8);
    return view('allProduct',compact('products'));
}
public function searchProduct(){
    $r=request();
    $keyword=$r->keyword;
    $products=DB::table('products')->where('name','like','%'.$keyword.'%')->paginate(5);
    return view('allProduct')->with('products',$products);
}
public function phone(){
    $viewPhone=DB::table('products')->where('CategoryID','=','2');
    return view('allProduct')->with('products',$viewPhone);
}
public function viewProduct(){
    (new CartController)->cartItem();
    $products=Product::all();
    return view('viewProducts')->with('products',$products);
}
}
