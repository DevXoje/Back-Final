<?php

namespace App\Http\Controllers;

use App\Models\ProductEloquent;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = ProductEloquent::all();
		return $users;
	}
}
