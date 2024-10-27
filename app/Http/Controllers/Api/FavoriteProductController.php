<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use Illuminate\Http\Request;

class FavoriteProductController extends Controller
{
    public function index($user_id){
        $data = FavoriteProduct::query()->where('user_id', $user_id)->get();
        return response()->json($data);
    }
    public function store(Request $request){
        $data = $request->all();
        
    }
}
