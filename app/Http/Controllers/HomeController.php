<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductFeatures;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function category()
    {
        $categories = Category::with('products')->where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('category', compact('categories'));
    }
    public function products()
    {
        $categories = Category::where('user_id', Auth::user()->id)->get();
        $features = Feature::limit(5)->get();

        // Eager load categories and features with the products
        $products = Product::with('categories', 'features')
            ->where('creator_id', Auth::user()->id)
            ->latest()->paginate(5);

        return view('products', compact('features', 'categories', 'products'));
    }

    public function categoryStore(Request $request)
    {


        $request->validate([
            'category' => 'required|string|max:255',
        ]);


        $category = new Category();
        $category->name = $request->category;
        $category->user_id = auth()->id();
        $category->save();

        return redirect()->back()->with('success', 'Category Created Successfully');
    }

    public function getUserCategories()
    {
        $userCategories = auth()->user()->categories()->get();
        return $userCategories;
    }

    public function productStore(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size: 2MB
        ]);

        $product = new Product();
        $product->title = $request->title;

        $imageName = time() . '.' . $request->product_image->extension();
        $request->product_image->move(public_path('images'), $imageName);
        $product->image = $imageName;
        $product->creator_id = Auth::user()->id;
        $product->save();


        foreach ($request->categories as $key => $value) {
            $productCategory = new ProductCategories();
            $productCategory->product_id = $product->id;
            $productCategory->category_id = $value;
            $productCategory->save();
        }

        foreach ($request->features as $key => $value) {
            $productFeature = new ProductFeatures();
            $productFeature->product_id = $product->id;
            $productFeature->feature_id = $value;
            $productFeature->save();
        }


        return redirect()->back()->with('success', 'Product Created Successfully');
    }
}
