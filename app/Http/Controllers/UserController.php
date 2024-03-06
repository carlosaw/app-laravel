<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    //
    public function index (Request $request)
    {
        //dd($request->search);

        $users = $this->model
            ->getUsers(
                search: $request->search ?? ''
            );
        //dd($users);
        //dd('UserController@index');
        return view('users.index', compact('users'));
    }
    public function show($id)
    {
        //$user = $this->model->where('id', $id)->first();
        if(!$user = $this->model->find($id))
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

        $user = $this->model->create($data);

        return redirect()->route('users.index', $user);
    }
    public function edit($id) {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update (StoreUpdateUserFormRequest $request, $id) {

        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');
        $data = $request->only('name', 'email');
        if($request->password)
            $data['password'] = bcrypt($request->password);
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function delete($id) {
        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');
        $user->delete();

        return redirect()->route('users.index');
    }
}
