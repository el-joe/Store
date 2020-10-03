<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function statistics()
    {
        $data['users'] = User::count();
        $data['products'] = Product::count();
        return view('admin.statistics',$data);
    }
}
