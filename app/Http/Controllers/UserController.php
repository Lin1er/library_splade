<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Tables\Users;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Components\Toast;
use ProtoneMedia\Splade\SpladeTable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.users.index', [
            'users' => Users::class,

        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.users.create',[
            'kelases' => Kelas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'kelas_id' => $request->kelas_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

            // Toast::title('User created');
        
        return to_route('admins.users.index');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admins.users.edit', [
            'user' => $user,
            'kelases' => Kelas::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'kelas_id' => $request->kelas_id,
            'email' => $request->email,
        ]);

        return to_route('admins.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return to_route('admins.users.index');
    }
}
