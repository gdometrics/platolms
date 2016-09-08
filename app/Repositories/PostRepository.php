<?php 

namespace App\Repositories;

class PostRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = 'posts';
		$this->model = 'App\Models\Post';
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getPost($postIdOrIds)
	{
		return $this->find($this->model, $postIdOrIds);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getPostBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getPostsByIds(array $postIds = null)
	{
		return $this->getPost($postIds);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getPosts(array $scopes = [])
	{
		return $this->findAllBy($this->table, $scopes);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function paginatePosts(array $scopes, $limit = 15, $withTrashed = false)
	{
		return $this->paginate($this->table, $scopes, $limit, $withTrashed);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createPost(array $postData)
	{
		return $this->create($this->table, $postData);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updatePost($postId, array $postData)
	{
		return $this->update($this->model, $postId, $postData);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deletePost($postId)
	{
		return $this->delete($this->model, $postId);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deletePosts(array $postIds)
	{
		$deletedPosts = [];
		foreach ($postIds as $postId)
		{
			$deletedPost = $this->deleteUser($postId);
			array_push($deletedPosts, $deletedPost);
		}

		return $deletedPosts;
	}

}
