<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Attribute_value;
use App\Helper\CartHelper;
use Illuminate\Http\Request;

class CartController extends Controller
{

    function view()
    {
        return view('shopping_cart');
    }

    // function add(CartHelper $cart,$id)
    // {
    //     $product=Product::find($id);
    //     $cart->add($product);

    //     return view('mini-cart');
    // }

    function add_single(CartHelper $cart,$id,Request $request)
    {
        $size_id=$request->size;
        $color_id=$request->color;
        $quantity=$request->quantity;

        $product=Product::find($id);
        $size=Attribute_value::find($size_id);
        $color=Attribute_value::find($color_id);

        $cart->add($product,$size,$color,$quantity);

        return redirect()->back();
    }

    function remove(CartHelper $cart,$id)
    {

        $cart->remove($id);
        return view('mini-cart');
    }

    function remove_list(CartHelper $cart,$id)
    {
        $cart->remove($id);
        return view('list-cart');
    }

    function update(CartHelper $cart,Request $request)
    {
        $qtts = $request->quantity;
        $ids = $request->id;

        $cart->update($ids,$qtts);
        return redirect()->back();
    }

    function clear(CartHelper $cart)
    {
        $cart->clear();
        return view('list-cart');
    }
}
