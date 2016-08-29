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
	public function getUser($userIdOrIds)
	{
		return $this->find($this->model, $userIdOrIds);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUserBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUsersByIds(array $userIds = null)
	{
		return $this->getUser($userIds);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUsers(array $scopes)
	{
		return $this->findAllBy($this->table, $scopes);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function paginateUsers(array $scopes, $limit = 15, $withTrashed = false)
	{
		return $this->paginate($this->table, $scopes, $limit, $withTrashed);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createUser(array $userData)
	{
		return $this->create($this->table, $userData);
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
			$user = $this->createUser($this->table, $userData);
			array_push($usersCreated, $user);
		}

		return $this->getUsersByIds($usersCreated);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateUser($userId, array $userData)
	{
		return $this->update($this->model, $userId, $userData);
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
			$user = $this->updateUser($userData->id, $userData);
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
