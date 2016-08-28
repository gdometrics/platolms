<?php 

namespace App\Repositories;

class UserRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->model = 'App\Models\User';
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUser($userId, $options = [])
	{
		return $this->findOne($this->model, $userId, $options);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUserByEmail($userEmail, $options = [])
	{
		return $this->findOneBy($this->model, $userEmail, 'email', $options);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUsers(array $userIds = null, $options = [])
	{
		return $this->findAll($this->model, $userIds, $options);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUsersByEmail(array $userEmails, $options = [])
	{
		return $this->findAllBy($this->model, $userEmails, 'email', $options);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createUser(array $userData)
	{
		return $this->create($this->model, $userData);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createUsers(array $usersData)
	{
		$usersCreated = [];
		foreach ($usersData as $userData)
		{
			$user = $this->createUser($this->model, $userData);
			array_push($usersCreated, $user);
		}

		return $usersCreated;
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateUser($userId, array $userData)
	{
		return $this->update($userId, $userData);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateUsers(array $usersData)
	{
		$usersUpdated = [];
		foreach ($usersData as $userData)
		{
			$user = $this->updateUser($userData);
			array_push($usersUpdated, $user);
		}

		return $usersUpdated;
	}	

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteUser($userId)
	{
		return $this->delete($this->model, $userId);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteUsers(array $userIds)
	{
		$deletedUsers = [];
		foreach ($userIds as $userId)
		{
			$deletedUser = $this->deleteUser($userId);
			array_push($deletedUsers, $deletedUser);
		}

		return $deletedUsers;
	}

}
