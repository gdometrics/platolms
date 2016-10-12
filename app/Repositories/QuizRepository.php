<?php 

namespace App\Repositories;

class QuizRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = 'quizzes';
		$this->model = 'App\Models\Quiz';
	}

	/**
	 * Get the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getQuiz($entityIdOrIds)
	{
		return $this->find($this->model, $entityIdOrIds);
	}

	/**
	 * Get the entity by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getQuizBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Get a collection by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getQuizsByIds(array $entityIds = null)
	{
		return $this->getPost($entityIds);
	}

	/**
	 * Get a collection by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getQuizs(array $scopes = [])
	{
		return $this->findAllBy($this->table, $scopes);
	}

	/**
	 * Paginate the collection.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function paginateQuizs(array $scopes, $limit = 15, $withTrashed = false)
	{
		return $this->paginate($this->model, $scopes, $limit, $withTrashed);
	}

	/**
	 * Create an entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createQuiz(array $entityData)
	{
		return $this->create($this->table, $entityData);
	}

	/**
	 * Update the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateQuiz($entityId, array $entityData)
	{
		return $this->update($this->model, $entityId, $entityData);
	}

	/**
	 * Delete the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteQuiz($entityId)
	{
		return $this->delete($this->model, $entityId);
	}

	/**
	 * Delete multiple entities.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteQuizs(array $entityIds)
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
