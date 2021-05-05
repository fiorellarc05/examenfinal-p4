<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('shop.shopindex',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showcart(Product $product)
    {
        return view('shop.shoppingcart',compact('product'));
    }

    public function showWishlist(Product $product)
    {
        return view('shop.wishlist',compact('product'));
    }
    
    public function checkout(Product $product)
    {
        return view('shop.checkout',compact('product'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('shoppingcart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name_Product" => $product->name_Product,
                        "quantity_Product" => 1,
                        "price_Product" => $product->price_Product,
                    ]
            ];

            session()->put('shoppingcart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity_Product']++;

            session()->put('shoppingcart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name_Product" => $product->name_Product,
            "quantity_Product" => 1,
            "price_Product" => $product->price_Product,
        ];

        session()->put('shoppingcart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function addToWishlist($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart2 = session()->get('wishlist');

        // if cart2 is empty then this the first product
        if(!$cart2) {

            $cart2 = [
                    $id => [
                        "name_Product" => $product->name_Product,
                        "quantity_Product" => 1,
                        "price_Product" => $product->price_Product,
                    ]
            ];

            session()->put('wishlist', $cart2);

            return redirect()->back()->with('success', 'Product added to cart2 successfully!');
        }

        // if cart2 not empty then check if this product exist then increment quantity
        if(isset($cart2[$id])) {

            $cart2[$id]['quantity_Product']++;

            session()->put('wishlist', $cart2);

            return redirect()->back()->with('success', 'Product added to cart2 successfully!');

        }

        // if item not exist in cart2 then add to cart2 with quantity = 1
        $cart2[$id] = [
            "name_Product" => $product->name_Product,
            "quantity_Product" => 1,
            "price_Product" => $product->price_Product,
        ];

        session()->put('wishlist', $cart2);

        return redirect()->back()->with('success', 'Product added to cart2 successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity_Product)
        {
            $cart = session()->get('shoppingcart');
 
            $cart[$request->id]["quantity_Product"] = $request->quantity_Product;
 
            session()->put('shoppingcart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function updateWishlist(Request $request)
    {
        if($request->id and $request->quantity_Product)
        {
            $cart2 = session()->get('wishlist');
 
            $cart2[$request->id]["quantity_Product"] = $request->quantity_Product;
 
            session()->put('wishlist', $cart2);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('shoppingcart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('shoppingcart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function removeWishlist(Request $request)
    {
        if($request->id) {
 
            $cart2 = session()->get('wishlist');
 
            if(isset($cart2[$request->id])) {
 
                unset($cart2[$request->id]);
 
                session()->put('wishlist', $cart2);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }
}