<?php 

namespace App\Repositories;

class RoleRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = 'roles';
		$this->model = 'App\Models\Role';
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getAllRoles()
	{
		return $this->findAll($this->model);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getRoles($roleIdOrIds)
	{
		return $this->find($this->model, $userIdOrIds);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getRoleBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createRole(array $roleData)
	{
		return $this->create($this->table, $roleData);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateRole($roleId, array $roleData)
	{
		return $this->update($this->model, $roleId, $roleData);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteRole($roleId)
	{
		return $this->delete($this->model, $roleId);
	}

}
