<?php

namespace BoundedContent\User\Infrastructure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;


class UpdateUserControllerBase extends Controller
{
	public function __construct()
	{
	}
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		//
	}
}
