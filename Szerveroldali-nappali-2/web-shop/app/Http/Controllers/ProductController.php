<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            "products" => Product::with('orders') -> paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Product::class);
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Product::class);
        $validated = $request -> validate([
            "name" => "required|string|min:3",
            "price" => "required|integer|min:0",
            "image_file" => "image|max:5000"
        ], [
            "name.required" => "A termék nevének megadása kötelező!",
            "name.string" => "A termék neve szöveg kell legyen!",
            "name.min" => "A termék neve legalább :min karakter legyen!",
            "price.required" => "A termék árának megadása kötelező!",
            "price.integer" => "A termék ára egész szám kell legyen!",
            "price.min" => "A termék ára legalább :min Ft kell legyen!",
            "image_file.image" => "A kép képformátum kell legyen!",
            "image_file.max" => "A kép maximum :max kB lehet!"
        ]);
        // ha a validátor elbukik, visszairányit oda, ahonnan jöttél
        // tehát innentől lefelé biztos, hogy a validátor átment :D

        if ($request -> hasFile('image_file')){
            $file = $request -> file('image_file');
            $fileName = Str::uuid() . "." . $file -> getClientOriginalExtension();
            $validated["image"] = $fileName;
            Storage::disk("public") -> put("/images/{$fileName}", $file -> getContent());
        }

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
        Gate::authorize('update', $product);
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Gate::authorize('update', $product);
        $validated = $request -> validate([
            "name" => "required|string|min:3",
            "price" => "required|integer|min:0",
            "image_file" => "image|max:5000"
        ], [
            "name.required" => "A termék nevének megadása kötelező!",
            "name.string" => "A termék neve szöveg kell legyen!",
            "name.min" => "A termék neve legalább :min karakter legyen!",
            "price.required" => "A termék árának megadása kötelező!",
            "price.integer" => "A termék ára egész szám kell legyen!",
            "price.min" => "A termék ára legalább :min Ft kell legyen!",
            "image_file.image" => "A kép képformátum kell legyen!",
            "image_file.max" => "A kép maximum :max kB lehet!"
        ]);
        // ha a validátor elbukik, visszairányit oda, ahonnan jöttél
        // tehát innentől lefelé biztos, hogy a validátor átment :D

        if ($request -> hasFile('image_file')){
            $file = $request -> file('image_file');
            $fileName = Str::uuid() . "." . $file -> getClientOriginalExtension();
            $validated["image"] = $fileName;
            Storage::disk("public") -> put("/images/{$fileName}", $file -> getContent());
        }

        $product -> update($validated);
        Session::flash("product-updated", $product);
        return redirect() -> route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product);
        $product -> delete();
        Session::flash("product-deleted", $product);
        return redirect() -> route('products.index');
    }
}
