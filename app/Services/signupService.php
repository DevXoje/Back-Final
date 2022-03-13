<?php

declare(strict_types=1);

namespace App\Services;

//use KeithMifsud\Demo\Domain\Customer\Customer;
use Illuminate\Contracts\Auth\Authenticatable;

use App\Infrastructure\Persistance\Auth\AuthRepository;
//use KeithMifsud\Demo\Domain\Common\UniqueIdentifier\BaseUniqueIdentifier;
//use KeithMifsud\Demo\Application\Repositories\Customership\CustomerRepository;
//use KeithMifsud\Demo\Application\Repositories\Authentication\UserRepository;

/**
 * Application service for registering a new customer.
 *
 * Sets up the customer and user profile.
 *
 */
final class SignupService
{


	/**
	 * @var CustomerRepository
	 */
	protected $customerRepository;


	/**
	 * @var UserRepository
	 */
	protected $userRepository;


	/**
	 * RegisterCustomer constructor.
	 *
	 * @param CustomerRepository $customerApplicationRepository
	 * @param UserRepository $userRepository
	 */
	public function __construct(
		AuthRepository $customerApplicationRepository,
		UserRepository $userRepository
	) {
		$this->customerRepository = $customerApplicationRepository;
		$this->userRepository = $userRepository;
	}


	/**
	 * Executes the service.
	 *
	 * Creates an Authenticatable User and Customer.
	 * Then stores them in repositories.
	 *
	 * @param string $emailAddress
	 * @param string $password
	 * @param string $firstName
	 * @param string $lastName
	 * @return Authenticatable
	 */
	public function execute(
		string $emailAddress,
		string $password,
		string $firstName,
		string $lastName
	): Authenticatable {

		$identifier = BaseUniqueIdentifier::generate();
		$user = $this->userRepository->createNewUser(
			$identifier,
			$emailAddress,
			$password
		);

		$customer = Customer::register(
			$identifier,
			$firstName,
			$lastName
		);
		$this->customerRepository->storeNewCustomer($customer);

		return $user;
	}
}
