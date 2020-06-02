<?php

namespace App\Http\Controllers\Administrator;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(Request $request)
    {
        $users = User::latest()->when($request->has('q'), function ($query){
            $query->search(request("q"));
        })->paginate();

        return view("users.index", ["users" => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required"],
            "email" => ["required"],
            "role" => ["required"],
            "password" => ["required"],
        ]);

        User::create($request->only(["name", "email", "role", "password"]));

        return redirect()->back();
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => ["required"],
            "email" => ["required"],
            "role" => ["required"],
        ]);

        $user->update($request->only(["name", "email", "role"]));

        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
