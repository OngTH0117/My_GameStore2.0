<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Ship;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      function index() {
      
        $data=Product::all();
        return view('customerHome',['products'=>$data]);
      }

      function detail($id)
      {
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
      }
      
      function search(Request $req){

        $data = Product::where('productName','like','%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
        
      }

      function addCart(Request $req){
        
        if(Auth::guard('web')->check()){
        
          $cart=new Cart;
          $cart->customerId=Auth::id();
          $cart->productId=$req->productId;
          $cart->save();
          return redirect('/customerHome');

        }
        else{
          return redirect('/customerHome');
        }
        
      }

      static function cartItem(){

        $customerId=Auth::id();
        return Cart::where('customerId',$customerId)->count();
      }

      function cartList(){

        $customerId=Auth::id();
        $products=DB::table('cart')
        ->join('products','cart.productId','=','products.id')
        ->where('cart.customerId',$customerId)
        ->select('products.*','cart.id as cartId')
        ->get();

        return view('cart',['products'=>$products]);

      }
      function placeOrder(Request $req){

        $customerId=Auth::id();
        $order = Cart::where('customerId',$customerId)->get();
        foreach($order as $cart){
          $ships=new Ship;
          $ships->CustomerId=Auth::id();
          $ships->Cname=Auth::user()->name;
          $ships->Cphone=Auth::user()->contact;
          $ships->Caddress=Auth::user()->address;
          $ships->productName=$cart['productId'];
          $ships->shipped="0";
          $ships->save();
          Cart::where('customerId',$customerId)->delete();
        }
          $req->input();
          return redirect('/customerHome');
      }

      function pcGames(){ 
        $data = Product::where('console','like','PC')->get();
        return view('pcGames',['products'=>$data]);
      }

      function psGames(){ 
        $data = Product::where('console','like','PS5')->get();
        return view('psGames',['products'=>$data]);
      }

      function nintendoGames(){ 
        $data = Product::where('console','like','nintendo switch')->get();
        return view('nintendoGames',['products'=>$data]);
      }


      function removeCart($id){

        Cart::destroy($id);
        return redirect('cart');
      }
      

 
}
