<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::get();
        //dd($users);
        //dd('UserController@index');
        return view('users.index', compact('users'));
    }
    public function show($id)
    {
        //$user = User::where('id', $id)->first();
        if(!$user = User::find($id))
            return redirect()->route('users.index');
        //dd($user);
        //dd('users.show', $id);
        return view('users.show', compact('user'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request) {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return redirect()->route('users.index');
    }
        //return redirect()->route('users.show', $user->id);
        //dd('Cadastrando o usuário');
        //dd($request->all());
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // dd($request->only([
        //     'name', 'email', 'password'
        // ]));
}
