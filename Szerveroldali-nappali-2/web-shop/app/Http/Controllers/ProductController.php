<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            "products" => Product::paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            "name" => "required|string|min:3",
            "price" => "required|integer|min:0"
        ], [
            "name.required" => "A termék nevének megadása kötelező!",
            "name.string" => "A termék neve szöveg kell legyen!",
            "name.min" => "A termék neve legalább :min karakter legyen!",
            "price.required" => "A termék árának megadása kötelező!",
            "price.integer" => "A termék ára egész szám kell legyen!",
            "price.min" => "A termék ára legalább :min Ft kell legyen!"
        ]);
        // ha a validátor elbukik, visszairányit oda, ahonnan jöttél
        // tehát innentől lefelé biztos, hogy a validátor átment :D
        $product = Product::create($validated);
        Session::flash("product-created", $product);
        return redirect() -> route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
            'orderCount' => $product -> orders() -> count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
