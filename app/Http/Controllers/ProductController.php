<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{

    public function index(){
        return Product::all();  
            
    }

    public function store(Request $req){   
        return Product::create($req->all());   
    }

    public function update(Request $req, $id){
        
        $product = Product::findOrFail($id);
        $product ->update($req->all());
        return $product;

    }

    public function destroy($id){
        
        $product = Product::findOrFail($id);
        $product ->delete();
        return 204;

    }
}

    