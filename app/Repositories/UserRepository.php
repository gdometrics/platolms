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
	 * Get the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUser($entityIdOrIds)
	{
		return $this->find($this->model, $entityIdOrIds);
	}

	/**
	 * Get the entity by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUserBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Get a collection by a fields.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUsersByIds(array $entityIds = null)
	{
		return $this->getUser($entityIds);
	}

	/**
	 * Get a collection.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getUsers(array $scopes = [])
	{
		return $this->findAllBy($this->model, $scopes);
	}

	/**
	 * Paginate the collection.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function paginateUsers(array $scopes, $limit = 15, $withTrashed = false)
	{
		return $this->paginate($this->model, $scopes, $limit, $withTrashed);
	}

	/**
	 * Create an entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createUser(array $entityData)
	{
		if (!isset($entityData['password']))
		{
			$entityData['password'] = makeRandomPassword();
		}

		return $this->create($this->table, $entityData);
	}

	/**
	 * Create multiple entities.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createUsers(array $entitiesData)
	{
		$usersCreated = [];
		foreach ($entitiesData as $entityData)
		{
			$user = $this->createUser($entityData);
			array_push($usersCreated, $user);
		}

		return $this->getUsersByIds($usersCreated);
	}

	/**
	 * Update the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateUser($entityId, array $entityData)
	{
		return $this->update($this->model, $entityId, $entityData);
	}

	/**
	 * Update user Authentication.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateUserAuth($entityId, array $entityData)
	{
        unset($entityData['password_confirmation']);
        $entityData['password'] = bcrypt($entityData['password']);
		return $this->update($this->model, $entityId, $entityData);
	}
	
	/**
	 * Update multiple entities.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateUsers(array $entitiesData)
	{
		$usersUpdated = [];
		foreach ($entitiesData as $entityData)
		{
			$user = $this->updateUser($entityData->id, $entityData);
			array_push($usersUpdated, $user);
		}

		return $usersUpdated;
	}	

	/**
	 * Delete the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteUser($entityId)
	{
		return $this->delete($this->model, $userId);
	}

	/**
	 * Delete multiple entities.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteUsers(array $entityIds)
	{
		$deletedUsers = [];
		foreach ($entityIds as $entityId)
		{
			$deletedUser = $this->deleteUser($entityId);
			array_push($deletedUsers, $deletedUser);
		}

		return $deletedUsers;
	}

}
