<?php

namespace App\Http\Controllers;

use App\Infrastructure\Persistance\Product\ProductEloquent;
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

	public function show($id)
	{
		return ProductEloquent::find($id);
	}
}
