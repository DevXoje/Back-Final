<?php

namespace BoundedContent\User\App\Register;

use BoundedContent\User\Domain\User;
use BoundedContent\User\Domain\ValueObjects\{UserId, UserName, UserPassword};
use BoundedContent\User\Infrastructure\Repositories\UserRepository;

class UserRegister
{
	public function __construct(private UserRepository $repository/* , DomainEventPublic $publisher */)
	{
		$this->repository = $repository;
	}
	/* public function __invoke(CreateUserRequest $request)
	{
		$id=new UserId($request->id());
		$name=new UserName($request->name());
		$password=new UserPassword($request->password());

		$user=User::create($id, $name, $password);

		$this->repository->save($user);
	} */
	public function __invoke()
	{
	}
}
