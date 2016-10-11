<?php 

namespace App\Repositories;

class ThemeRevisionRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = 'theme_revisions';
		$this->model = 'App\Models\ThemeRevision';
	}

	/**
	 * Get the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getThemeRevision($entityIdOrIds)
	{
		return $this->find($this->model, $entityIdOrIds);
	}

	/**
	 * Get the entity by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getThemeRevisionBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Get a collection by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getThemeRevisionsByIds(array $entityIds = null)
	{
		return $this->getPost($entityIds);
	}

	/**
	 * Get a collection by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getThemeRevisions(array $scopes = [])
	{
		return $this->findAllBy($this->table, $scopes);
	}

	/**
	 * Paginate the collection.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function paginateThemeRevisions(array $scopes, $limit = 15, $withTrashed = false)
	{
		return $this->paginate($this->model, $scopes, $limit, $withTrashed);
	}

	/**
	 * Create an entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createThemeRevision(array $entityData)
	{
		return $this->create($this->table, $entityData);
	}

	/**
	 * Update the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateThemeRevision($entityId, array $entityData)
	{
		return $this->update($this->model, $entityId, $entityData);
	}

	/**
	 * Delete the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteThemeRevision($entityId)
	{
		return $this->delete($this->model, $entityId);
	}

	/**
	 * Delete multiple entities.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteThemeRevisions(array $entityIds)
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
