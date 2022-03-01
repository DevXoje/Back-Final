<?php

namespace App\Http\Controllers;

use App\Models\AuthEloquent;
use Illuminate\Http\Request;

class AuthController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = AuthEloquent::all();
		return $users;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$user = new AuthEloquent();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->remember_token = $request->remember_token;
		$user->save();
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\AuthEloquent  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(AuthEloquent $user)
	{
		$userFinded = AuthEloquent::findOrFail($user->id);
		return $userFinded;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\AuthEloquent  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(AuthEloquent $user)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\AuthEloquent  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, AuthEloquent $user)
	{
		$user = AuthEloquent::findOrFail($request->id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->remember_token = $request->remember_token;
		$user->save();

		return $user;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\AuthEloquent  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(AuthEloquent $user)
	{
		$userDestroyed = AuthEloquent::destroy($user->id);
		return $userDestroyed;
	}
}
