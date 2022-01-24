<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use BoundedContent\User\Infrastructure\UpdateUserControllerBase;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
	private $updateUserController;
	public function __construct(UpdateUserControllerBase $updateUserControllerBase)
	{
		$this->updateUserController = $updateUserControllerBase;
	}
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
		return new UserResource($this->updateUserController->__invoke($request));
		/* return UserResource::collection($this->createUserController->__invoke($request)); */
    }
}
