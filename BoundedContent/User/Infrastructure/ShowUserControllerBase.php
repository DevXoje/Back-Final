<?php

namespace BoundedContent\User\Infrastructure;


class ShowUserControllerBase
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
	public function __invoke(/* Request */ $request)
	{
		return "Hello World";
	}
}
