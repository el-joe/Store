<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::with('user','items')->orderByDesc('id')->paginate(20);
        $data['status'] = ['opened','accepted','canceled','on_delivery','delivered'];
        return view('admin.carts.index',$data); 
    }

    public function show($id)
    {
        $cart = Cart::with('user','items.product')->find($id);
        return view('admin.carts.show',compact('cart'));
    }

    public function updateStatus(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $cart->update($request->only('status'));
        return response()->json(['status'=>true]);
    }

}
