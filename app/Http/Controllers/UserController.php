<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.manajemen-admin.index',[
            'title' => 'Manajemen Admin',
            'users' => $users,
        ]);
    }

    public function create(){   
        return view('admin.manajemen-admin.create',[
            'title' => 'Manajemen Admin',  
        ]);
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/users')->with('success', 'Data admin baru berhasil disimpan!');
    
    }

    public function edit($id){
        $user = User::find($id);

        return view('admin.manajemen-admin.edit', [
            'title' => 'Edit Admin',
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/users')->with('success', 'Data admin baru berhasil di edit!');

    }

    public function destroy($id){

        $user = User::find($id);

        $user->delete();

        return redirect('/users')->with('success', 'Data admin berhasil dihapus');
   }

}   
