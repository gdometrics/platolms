<?php 

namespace App\Repositories;

class ChatRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = 'chats';
		$this->model = 'App\Models\Chat';
	}

	/**
	 * Get the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getChat($entityIdOrIds)
	{
		return $this->find($this->model, $entityIdOrIds);
	}

	/**
	 * Get the entity by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getChatBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Get a collection by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getChatsByIds(array $entityIds = null)
	{
		return $this->getPost($entityIds);
	}

	/**
	 * Get a collection by a field.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getChats(array $scopes = [])
	{
		return $this->findAllBy($this->table, $scopes);
	}

	/**
	 * Paginate the collection.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function paginateChats(array $scopes, $limit = 15, $withTrashed = false)
	{
		return $this->paginate($this->model, $scopes, $limit, $withTrashed);
	}

	/**
	 * Create an entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createChat(array $entityData)
	{
		return $this->create($this->table, $entityData);
	}

	/**
	 * Update the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateChat($entityId, array $entityData)
	{
		return $this->update($this->model, $entityId, $entityData);
	}

	/**
	 * Delete the entity.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteChat($entityId)
	{
		return $this->delete($this->model, $entityId);
	}

	/**
	 * Delete multiple entities.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteChats(array $entityIds)
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
