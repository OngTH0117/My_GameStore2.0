<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Ship;

class ShippingController extends Controller
{
    public function index(){
        return Ship::all();      
    }

    public function store(){
        
        return Ship::create($req->all());
    }

    public function update(Request $req, $id){
        
        $ship = Ship::findOrFail($id);
        $ship ->update($req->all());
        return $ship;

    }   
}
