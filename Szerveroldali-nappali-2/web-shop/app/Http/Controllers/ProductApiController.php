<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::orderBy("name") -> with('orders') -> withCount('orders') -> get() -> toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        return $product -> toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $product)
    {
        // if (filter_var($product, FILTER_VALIDATE_INT) === false)
        //     return response() -> json(["message" => "product must be integer."], 422);

        Validator::make(
            ['product' => $product],
            ['product' => 'required|integer']
        ) -> validate();

        // $product = Product::find($product);
        // if ($product === null)
        //     return response() -> json(["message" => "product not found."], 404);
        // return $product;

        return Product::findOrFail($product) -> withCount('orders') -> first() -> toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product)
    {
        Validator::make(
            ['product' => $product],
            ['product' => 'required|integer']
        ) -> validate();
        $product = Product::findOrFail($product);
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
        return $product -> toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $product)
    {
        Validator::make(
            ['product' => $product],
            ['product' => 'required|integer']
        ) -> validate();
        $product = Product::findOrFail($product);
        $product -> delete();
        return response() -> json([], 204);
    }

    public function login(Request $request){
        $validated = $request -> validate([
            "email" => "required|string|email",
            "password" => "required|string|min:8"
        ]);
        if (Auth::attempt($validated)){
            // jó volt minden, adjunk neki tokent :)
            $user = User::where('email', $validated['email']) -> first();
            $token = $user -> createToken("myWebshopToken");
            return response() -> json(["token" => $token -> plainTextToken], 201);
        } else {
            // hoppá
            return response() -> json(["message" => "Login failed."], 401);
        }
    }

    public function orderIndex(Request $request){
        $user = $request -> user();
        return $user -> orders;
    }

    public function orderUpdate(Request $request, string $order){
        Validator::make(
            ['order' => $order],
            ['order' => 'required|integer']
        ) -> validate();
        $order = Order::findOrFail($order);

        $validated = $request -> validate([
            "add" => "array",
            "remove" => "array",
            "add.*" => "integer|distinct|exists:products,id|not_in:".implode(",", $request -> input('remove') ?? []),
            "remove.*" => "integer|distinct|exists:products,id|not_in:".implode(",", $request -> input('add') ?? []),
        ]);
        $validated["add"] ??= [];
        $validated["remove"] ??= [];

        $start = $order -> products -> pluck('id') -> toArray();
        $order -> products() -> syncWithoutDetaching($validated["add"]);
        $order -> products() -> detach($validated["remove"]);

        return [
            "just got added" => array_values(array_diff($validated["add"], $start)),
            "was already added" => array_values(array_intersect($start, $validated["add"])),
            "just got removed" => array_values(array_intersect($start, $validated["remove"])),
            "was already removed" => array_values(array_diff($validated["remove"], $start))
        ];
    }
}
