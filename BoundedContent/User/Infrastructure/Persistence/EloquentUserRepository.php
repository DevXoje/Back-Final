<?php

namespace BoundedContent\User\Infrastructure\Persistence;

use BoundedContent\User\Domain\User;
use BoundedContent\User\Domain\ValueObjects\{UserId, UserName, UserPassword};

use BoundedContent\User\Infrastructure\Persistence\Eloquent\UserEloquentModel;
use BoundedContent\User\Infrastructure\Repositories\UserRepository;

final class EloquentUserRepository implements UserRepository
{
	public function save(User $user): void
	{
		$model = new UserEloquentModel();
		$model->id = $user->id()->value();
		$model->name = $user->name()->value();
		$model->password = $user->password()->value();
		$model->save();
	}
	public function search(UserId $id): ?User
	{
		$model = UserEloquentModel::find($id->value());
		return ($model) ? new User(new UserId($model->id), new UserName($model->name), new UserPassword($model->password)) : null;
	}
}
