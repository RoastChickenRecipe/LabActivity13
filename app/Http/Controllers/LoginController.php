<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return redirect(route('show.login'));
    }

    public function loginPage()
    {
        return view('loginPage');
    }

    public function registerPage()
    {
        return view('registerPage');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
       
        $user = User::where('email', '=', $request->input('email'))->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->regenerate();
                $request->session()->put('loginId', $user->id);
                return redirect(route('blogs.index'));

            }else{
                return back()->with('fail', 'Incorrect Credentials');
            }
            
            
        }else{
            return back()->with('fail', 'Invalid Username');
        }
    }

    public function logout(Request $request) {
        //Auth::logout();
        $request->session()->invalidate();
        //$request->session()->regenerateToken();
        $request->session()->flush();
        return redirect('/login');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect(route('show.login'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
