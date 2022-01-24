<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\UserResource;
use App\Models\User;
use BoundedContent\User\Infrastructure\CreateUserControllerBase;

class CreateUserController extends Controller
{	/**
	* @var CreateUserControllerBase
	*/
	private $createUserController;
	public function __construct(CreateUserControllerBase $createUserControllerBase)
	{
		$this->createUserController = $createUserControllerBase;
	}
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$newUser= new UserResource($this->createUserController->__invoke($request));
		/* return UserResource::collection($this->createUserController->__invoke($request)); */
		return response($newUser,status:201);
	}
}
