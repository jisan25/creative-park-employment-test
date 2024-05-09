<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index()
    {

        return view('vendor.home');
    }
    public function category()
    {
        dd('vendor category is not available');
    }
    public function products()
    {
        dd('vendor products is not available');
    }
}
