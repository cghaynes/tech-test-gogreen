<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Models\User;


class AuthController extends Controller
{
	public function register(Request $request) {

		$user = new User();

		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->name = $request->name;

		$user->save();

		Auth::login($user);


		return redirect()->action([DashboardController::class, 'index']);

	}

	public function login(Request $request) {
		
		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {

			return redirect()->action([DashboardController::class, 'index']);
		} else {
			exit;
		}

	}

	public function logout(Request $request) {
		Auth::logout();
		return redirect()->action([DashboardController::class, 'index']);
	}
}
