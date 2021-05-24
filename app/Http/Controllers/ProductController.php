<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        $products = Products::all();
        return view('product', ['products' => $products]);
    }

    public function product_details($product_id){
        $product = Products::find($product_id);
        return view('product-detail', ['product' => $product]);
    }

    public function search_product(REQUEST $request){
        $results = Products::where('product_name', 'like', '%'.$request->input('query').'%')->
                            orWhere('category', 'like', '%'.$request->input('query').'%')->
                            get();
        return view('search-result-page', ['results' => $results]);
    }

    public function add_to_cart(Request $request){
        if(!(Session::has('user'))){
            $request->session()->flash('alert', 'Please login to add product in cart');
            return redirect('/login');
        }
        $user_id = $request->session()->get('user')->id;
        $product_id = $request->product_id;
        $if_already = CartModel::where([['product_id', '=', $product_id], ['user_id', '=', $user_id]])->get();
        if(count($if_already) > 0){
            $request->session()->flash('alert', 'Product already in cart');
            return redirect('/cart');
        }
        CartModel::insert([
            'product_id' => $product_id,
            'user_id' => $user_id,
        ]);
        $request->session()->flash('success', 'Product added to cart successfully');
        return redirect('/cart');
    }

    public function get_cart_count(){
        if(Session::has('user')){
            $user_id = Session::get('user')->id;
            return CartModel::where('user_id', $user_id)->count();
        }
        return false;
    }

    public function cart_details(){
        $user_id = Session::get('user')->id;
        $items = CartModel::where('user_id', $user_id)->join('products', 'products.id', '=', 'cart.product_id')->get();
        return View('cart-detail', ['items' => $items]);
    }

    public function remove_cart_product(Request $request){
        $user_id = Session::get('user')->id;
        $product_id = $request->product_id;
        CartModel::where([['user_id', '=', $user_id], ['product_id', '=', $product_id]])->delete();
        return redirect('/cart');
    }

    public function buy_cart_product(Request $request){
        if(!(Session::has('user'))){
            return redirect('/login');
        }else{
            return $request;
        }
    }
}
