<?php

namespace App\Http\Controllers;

use App\cart;
use App\products;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class frontController extends Controller
{
    public function index(){
        return view('index');
    }
    public function getAllProducts(){
    $products= products::OrderBy('id','desc')->select(['id','name','description','smalldescription','image'])->get();
    return response()->json(['status'=>true,'data'=>$products]);
    }
    public function counCart(){
       // $count = cart::where('user_id','1')->get();
        $count = DB::table('cart')->get();
        $count= count($count);
        return response()->json(['status'=>true,'data'=>$count]);
    }
    public function addcart($id){
        $product = new cart();
        $product->product_id = $id;
        $product->quantity = 1;
        $product->save();
        return response()->json(['status'=>true]);

    }
    public function getCart(){
        $cart = DB::table('cart')->leftJoin('products','cart.product_id','products.id')
            ->select('cart.id','name','quantity','price','image')
            ->get();
        if (count($cart)!=0){
        return response()->json(['status'=>true,'data'=>$cart]);

        }else{
            return response()->json(['status'=>true,'data'=>null]);

        }
    }
    public function updateCart(Request $request){
        $id = $request->input('id');
        $qunt= $request->input('qunt');
        try {

        $cart = cart::findOrFail($id);
        $cart->quantity =$qunt;
        $cart->update();
            return response()->json(['status'=>true,'data'=>null]);
        }catch (ModelNotFoundException $exception){
            return response()->json(['status'=>false,'data'=>null]);
        }
    }
    public function delete($id){
        try {
            $item = cart::findOrFail($id);
            $item->delete();
        }catch (ModelNotFoundException $exception){

        }
    }
}
