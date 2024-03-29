<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    //
    public function index(Request $request)
    {
        //dd($request->search);
        $search = $request->search;
        $users = User::where(function ($query) use ($search) {
            if($search) {
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->with('comments')->paginate(15);
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

        if ($request->image) {
            //$data['image'] = $request->image->store('users');
            $data['image'] = $request->image->store('users');
        }
        $this->model->create($data);
        //dd($request->image);
        //$user = User::create($data);
        return redirect()->route('users.index');
    }

    public function edit($id) {
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update (StoreUpdateUserFormRequest $request, $id) {

        if(!$user = User::find($id))
            return redirect()->route('users.index');
        $data = $request->only('name', 'email');
        if($request->password)
            $data['password'] = bcrypt($request->password);

            if ($request->image) {
                if ($user->image && Storage::exists($user->image)) {
                   Storage::delete($user->image);
                }
                $data['image'] = $request->image->store('users');
            }

        $user->update($data);

        return redirect()->route('users.index');

    }

    public function delete($id)
    {
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        $user->delete();

        return redirect()->route('users.index');
    }
}
