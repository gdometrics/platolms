<?php 

namespace App\Repositories;

class CategoryRepository extends Repository
{

	/**
	 *
	 */
	public function __construct()
	{
		$this->table = 'categories';
		$this->model = 'App\Models\Category';
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getCategory($catIdOrIds)
	{
		return $this->find($this->model, $catIdOrIds);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getCategoryBy($field, $value)
	{
		return $this->findOneBy($this->model, $field, $value);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getCategoryByIds(array $catIds = null)
	{
		return $this->getCategory($catIds);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function getCategories(array $scopes = [])
	{
		return $this->findAllBy($this->model, $scopes);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function paginateCategories(array $scopes, $limit = 15, $withTrashed = false)
	{
		return $this->paginate($this->model, $scopes, $limit, $withTrashed);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function createCategory(array $postData)
	{
		return $this->create($this->table, $postData);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function updateCategory($catId, array $postData)
	{
		return $this->update($this->model, $catId, $postData);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteCategory($catId)
	{
		return $this->delete($this->model, $catId);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function deleteCategories(array $catIds)
	{
		$deletedCategories = [];
		foreach ($catIds as $catId)
		{
			$deletedCategory = $this->deleteCategory($catId);
			array_push($deletedCategories, $deletedCategory);
		}

		return $deletedCategories;
	}

}
