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
	 * Get a collection.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getAllRoles()
	{
		return $this->findAll($this->model);
	}

	/**
	 * Get the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getRoles($entityIdOrIds)
	{
		return $this->find($this->model, $entityIdOrIds);
	}

	/**
	 * Get the entity by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getRoleBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Create an entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createRole(array $entityData)
	{
		return $this->create($this->table, $entityData);
	}

	/**
	 * Update the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateRole($entityId, array $entityData)
	{
		return $this->update($this->model, $entityId, $entityData);
	}

	/**
	 * Delete the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteRole($entityId)
	{
		return $this->delete($this->model, $entityId);
	}

}
