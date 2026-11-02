<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index', [
            "orders" => Auth::user() -> orders() -> with("products") -> get(),
            // "orders" => Order::where('user_id', Auth::id())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        if (Auth::id() !== $order -> user_id)
            return abort(403); // policy szebb lenne, de nincs idő :)

        return view('orders.show', [
            'order' => $order,
            'unassignedProducts' => Product::whereDoesntHave('orders', function ($query) use ($order) {
                $query->where('orders.id', $order->id);
            }) -> get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function removeProduct(Order $order, Product $product){
        if (Auth::id() !== $order -> user_id)
            return abort(403); // policy szebb lenne, de nincs idő :)

        $order -> products() -> detach($product -> id);

        return redirect() -> route("orders.show", ['order' => $order]);
    }

    public function addProduct(Request $request, Order $order){
        if (Auth::id() !== $order -> user_id)
            return abort(403); // policy szebb lenne, de nincs idő :)

        $validated = $request -> validate([
            "product_id" => "required|integer|exists:products,id"
        ]);

        $order -> products() -> syncWithoutDetaching($validated["product_id"]);

        return redirect() -> route("orders.show", ['order' => $order]);
    }
}

// Product::whereNotIn('id', $order -> product() -> get() -> pluck('id'))
