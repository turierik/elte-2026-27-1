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
}
