<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use BoundedContent\User\Infrastructure\ShowUserControllerBase;

class GetUserController extends Controller
{
	/* private $showUserController;
	public function __construct(ShowUserControllerBase $showUserControllerBase)
	{
		$this->showUserController = $showUserControllerBase;
	} */
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function __invoke(Request $request)
	{
		/* $test=new ShowUserControllerBase(); */
		$users = User::all();

		return $users;
	}

	public function __invokefail(Request $request)
	{
		/* return app('BoundedContent\User\Infrastructure\ShowUserControllerBase')->__invoke($request); */
		/* return $this->showUserController->__invoke($request); */
		/* return new UserResource($this->showUserController->__invoke($request)); */
		/* return UserResource::collection($this->showUserController->__invoke($request)); */
	}
}
