<?php 

namespace App\Repositories;

class UserRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = 'users';
		$this->model = 'App\Models\User';
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUser($userIdOrIds, $options = [])
	{
		return $this->find($this->model, $userIdOrIds, $options);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUserBy($field, $value, $options = [])
	{
		return $this->findOneBy($this->model, $field, $value, $options);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUsersByIds(array $userIds = null, $options = [])
	{
		return $this->getUsers($userIds, $options);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUsers(array $scopes, $options = [])
	{
		return $this->findAllBy($this->table, $scopes, $options);
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
