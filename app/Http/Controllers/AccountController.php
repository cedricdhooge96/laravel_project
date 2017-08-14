<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view('account.index', array('user' => $user));
    }

    public function settings()
    {
        $user = Auth::user();

        return view('account.settings', array('user' => $user));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();

        if (Input::hasFile('image')) {
            $file = $request->file('image');
            $file->move(public_path() . '/img/accounts/', $user->id . '.' . $file->getClientOriginalExtension());
        }

        return redirect('/account');
    }
}
