<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom'=>'required|string',
            'email'=>'required|email|unique:users',
            'role'=>'required|in:particulier,validateur,admin',
            'password'=>'required|min:6'
        ]);

        User::create([
            'nom'=>$request->nom,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success','Utilisateur créé');
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
    public function edit(User $user)
    {
        //
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'nom'=>'required|string',
            'email'=>"required|email|unique:users,email,$user->id",
            'role'=>'required|in:particulier,validateur,admin',
        ]);

        $user->update($request->only('nom','email','role'));
        return redirect()->route('admin.users.index')->with('success','Utilisateur mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','Utilisateur supprimé');
    }
}
