<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->get();
        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function create()
    {
        return view('users.form', [
            'user' => new User(),
            'page_meta' => [
                'title' => 'Create New User',
                'method' => 'post',
                'url' => route('users.store'),
                'submit_text' => 'Save',
            ],
        ]);
    }
    public function store(UserRequest $request)
    {

        User::create($request->validated());

        return to_route('users.index');
    }

    public function show(User $user)
    {
        return view('users/show', [
            'user' => $user,
        ]);
    }
    public function edit(User $user)
    {
        return view('users.form', [
            'user' => $user,
            'page_meta' => [
                'title' => 'Update User : ' . $user->name,
                'method' => 'put',
                'url' => route('users.update', $user),
                'submit_text' => 'Update',
            ],
        ]);
    }
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return to_route('users.index');
    }

    public function destroy(User $user)
    {
        $user -> delete();
        // return redirect(route('users.index'));
        return to_route('users.index');
    }
}
