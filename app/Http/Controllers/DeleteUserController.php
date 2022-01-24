<?php

namespace App\Http\Controllers;

use BoundedContent\User\Infrastructure\DeleteUserControllerBase;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
	private $deleteUserController;
	public function __construct(DeleteUserControllerBase $deleteUserControllerBase)
	{
		$this->deleteUserController = $deleteUserControllerBase;
	}
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
		
    }
}
