<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Mail\OrderMail;
use Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->paginate(5);
  
        return view('orders.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.checkout');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'order_name' => 'required',
            'order_email' => 'required',
            'order_address' => 'required',
            'order_total' => 'required',
        ]);
  
        Mail::to($data['order_email'])->send(new SendMail($data));
        Order::create($request->all());
   
        return redirect()->route('shop.thankYou')
                        ->with('success','Order made successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show',compact('order'));
    }
}
