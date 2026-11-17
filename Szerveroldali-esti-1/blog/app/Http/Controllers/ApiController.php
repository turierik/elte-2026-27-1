<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Post;

class ApiController extends Controller
{
    public function login(Request $request){
        $validated = $request -> validate([
            "email" => "required|string|email",
            "password" => "required|string|min:8"
        ]);
        if (Auth::attempt($validated)){
            // jó az email és jelszó, adjunk neki tokent
            $user = User::where('email', $validated['email']) -> first();
            $token = $user -> createToken("kiskutya");
            return response() -> json(["token" => $token -> plainTextToken]);
        } else {
            // el kell őt innen küldeni a fenébe
            return response() -> json(["message" => "Login failed."], 401);
        }
    }

    public function index(){
        return Post::all();
    }

    public function show(string $post){
        Validator::make([
            'post' => $post
        ], [
            'post' => 'required|integer'
        ]) -> validate();
        return Post::findOrFail($post);
    }

    public function store(Request $request){
        $validated = $request -> validate([
            "content" => "required|min:5",
            "title" => "required|max:64",
            // "user_id" => "required|integer|exists:users,id",
            "image_file" => "file|image"
        ], [
            "content.required" => "A tartalom kitöltése kötelező!",
            "content.min" => "A tartalom legalább :min karakterből álljon!"
        ]);
        // innentől lefelé BIZTOS, hogy a validáció átment :)
        $validated["user_id"] = $request -> user() -> id;

        if ($request -> hasFile("image_file")){
            $file = $request -> file("image_file");
            $fileName = Str::uuid() . "." . $file -> getClientOriginalExtension();
            $validated["image"] = $fileName;
            Storage::disk("public") -> put("/images/".$fileName, $file -> getContent());
        }

        $post = Post::create($validated);
        return $post;
    }

    public function showLikes(string $post){
        Validator::make([
            'post' => $post
        ], [
            'post' => 'required|integer'
        ]) -> validate();
        $post = Post::findOrFail($post);
        return $post -> likes;
    }

    public function likePost(Request $request, string $post){
        Validator::make([
            'post' => $post
        ], [
            'post' => 'required|integer'
        ]) -> validate();
        $post = Post::findOrFail($post);
        $post -> likes() -> attach($request -> user() -> id);
        return $request -> user() -> likes;
    }

    public function unlikePost(Request $request, string $post){
        Validator::make([
            'post' => $post
        ], [
            'post' => 'required|integer'
        ]) -> validate();
        $post = Post::findOrFail($post);
        $post -> likes() -> detach($request -> user() -> id);
        return $request -> user() -> likes;
    }
}
