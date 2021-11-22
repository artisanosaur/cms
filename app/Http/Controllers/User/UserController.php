<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('user.list', [
            'users' => $users
        ]);
    }

    public function show(int $userId)
    {
        $user = User::find($userId);

        return view('user.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();

        return redirect()->route('user.list')
            ->with('success', 'Product updated successfully');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('user.list')
            ->with('success','Product deleted successfully');
    }
}
