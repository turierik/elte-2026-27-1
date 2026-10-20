<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            "posts" => Post::with('author') -> orderByDesc('created_at') -> paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Post::class);
        return view("posts.create", [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Post::class);
        $validated = $request -> validate([
            "content" => "required|min:5",
            "title" => "required|max:64",
            // "user_id" => "required|integer|exists:users,id"
        ], [
            "content.required" => "A tartalom kitöltése kötelező!",
            "content.min" => "A tartalom legalább :min karakterből álljon!"
        ]);
        // innentől lefelé BIZTOS, hogy a validáció átment :)
        $validated["user_id"] = Auth::id();
        $post = Post::create($validated);
        Session::flash('post-created', $post);
        return redirect() -> route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
