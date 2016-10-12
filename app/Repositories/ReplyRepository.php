<?php 

namespace App\Repositories;

class ReplyRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = 'replies';
		$this->model = 'App\Models\Reply';
	}

	/**
	 * Get the entity
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getReply($entityIdOrIds)
	{
		return $this->find($this->model, $entityIdOrIds);
	}

	/**
	 * Get a collection by a fields.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getRepliesByIds(array $entityIds = null)
	{
		return $this->getReply($entityIds);
	}

	/**
	 * Get a collection.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getReplies(array $scopes = [])
	{
		return $this->findAllBy($this->table, $scopes);
	}

	/**
	 * Create an entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createReply(array $entityData)
	{
		return $this->create($this->table, $entityData);
	}

	/**
	 * Update the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateReply($entityId, array $entityData)
	{
		return $this->update($this->model, $entityId, $entityData);
	}

	/**
	 * Delete the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteReply($entityId)
	{
		return $this->delete($this->model, $entityId);
	}

	/**
	 * Delete multiple entities.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteReplies(array $entityIds)
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
