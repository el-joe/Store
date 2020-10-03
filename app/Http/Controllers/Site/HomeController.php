<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['categories'] = Category::all();
        $products = Product::query();
        if($request->cat){
            $products->whereHas('category',function($q)use($request){
                $q->whereSlug($request->cat);
            });
        }
        if($request->q){
            $products->where(function($q)use($request){
                $q->where('name','LIKE','%'.$request->q)
                    ->orWhere('name','LIKE',$request->q.'%')
                    ->orWhere('name','LIKE','%'.$request->q.'%');
            });
        }
        $data['products'] = $products->get();
        return view('site.home',$data);
    }

    public function singlePage($id)
    {
        $data['product'] = Product::find($id);
        return view('site.singlePage',$data);
    }
}
