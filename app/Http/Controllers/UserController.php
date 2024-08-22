<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['profile', 'editProfile', 'editProfileProcess']]);
        $this->middleware('admin', ['except' => ['profile', 'editProfile', 'editProfileProcess']]);
        $this->middleware('accepted', ['only' => ['profile', 'editProfile', 'editProfileProcess']]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.edit-profile', [
            'user' => $user
        ]);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('user.edit-user', [
            'user' => $user
        ]);
    }

    public function editProfileProcess(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        $user->name = $request->name;
        $user->phonenumber = $request->phonenumber;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();
        return redirect('/user/profile')->with('success', 'Profile berhasil diubah');
    }

    public function editUserProcess(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->phonenumber = $request->phonenumber;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();
        return redirect('/users')->with('success', 'User berhasil diubah');
    }

    public function index()
    {
        $users = User::paginate(15);
        return view('user.user', [
            'users' => $users,
        ]);
    }

    public function userRequest()
    {
        $users = User::where('user_accepted', 0)->paginate(15);
        return view('user.user-request', [
            'users' => $users,
        ]);
    }

    public function acceptUser($id)
    {
        $user = User::find($id);
        $user->user_accepted = 1;
        $user->save();
        return redirect('/users/request');
    }

    public function changeRole($id, Request $request)
    {
        $user = User::find($id);
        if ($request->role == 'admin') {
            $user->role = "admin";
            $user->save();
        } else if ($request->role == 'user') {
            $user->role = "user";
            $user->save();
        }

        return redirect('/users')->with('success', "User role berhasil diganti");
    }

    public function destroy(string $id)
    {
        User::destroy($id);
        return back()->with('success', 'Delete Success');
    }
}
