<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Cart::with('medicine')->where('user_id', Auth::user()->id)->get();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'medicines return successfully',
            'medicines' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cart = new Cart();
        $cart->medicine_id = $request->medicine_id;
        $cart->user_id = $request->user_id;
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json([
            'status' => true,
            'code' => 201,
            'message' => 'medicines add successfully',
            'medicines' => $cart,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::where('user_id', Auth::guard('sanctum')->id())->where('medicine_id', $id)->first();
        $cart->delete();
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Removed Successfully',

        ]);
    }
}
