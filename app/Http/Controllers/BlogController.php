<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', '=', session('loginId'))->first();
        $userData = post::where('user_id', '=', $user->id)->get();
        return view('authenticated.index', ['userData' => $userData, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pass = session('loginId');
        return view('authenticated.createPost',['getId' => $pass]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'body' => 'required|min:2'
        ]);

        post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->getId
        ]);
        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = post::findOrFail($id);
        return view('authenticated.editPost', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:2',
            'body' => 'required|min:2'
        ]);

        post::findOrFail($id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect(route('blogs.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        post::findOrFail($id)->delete();
        return redirect(route('blogs.index'));
    }
}
