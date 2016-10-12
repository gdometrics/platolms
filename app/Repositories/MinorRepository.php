<?php 

namespace App\Repositories;

class MinorRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = 'minors';
		$this->model = 'App\Models\Minor';
	}

	/**
	 * Get the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getMinor($entityIdOrIds)
	{
		return $this->find($this->model, $entityIdOrIds);
	}

	/**
	 * Get the entity by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getMinorBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Get a collection by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getMinorsByIds(array $entityIds = null)
	{
		return $this->getPost($entityIds);
	}

	/**
	 * Get a collection by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getMinors(array $scopes = [])
	{
		return $this->findAllBy($this->table, $scopes);
	}

	/**
	 * Paginate the collection.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function paginateMinors(array $scopes, $limit = 15, $withTrashed = false)
	{
		return $this->paginate($this->model, $scopes, $limit, $withTrashed);
	}

	/**
	 * Create an entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createMinor(array $entityData)
	{
		return $this->create($this->table, $entityData);
	}

	/**
	 * Update the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateMinor($entityId, array $entityData)
	{
		return $this->update($this->model, $entityId, $entityData);
	}

	/**
	 * Delete the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteMinor($entityId)
	{
		return $this->delete($this->model, $entityId);
	}

	/**
	 * Delete multiple entities.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteMinors(array $entityIds)
	{
		$deletedPosts = [];
		foreach ($entityIds as $entityId)
		{
			$deletedPost = $this->deleteUser($entityId);
			array_push($deletedPosts, $deletedPost);
		}

		return $deletedPosts;
	}

}
