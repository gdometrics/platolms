<?php 

namespace App\Repositories;

class Repository
{

	/**
	 * Retrieve a single entity
	 */
    public function findOne($model, $id, array $options)
    {
    	return $model::find($id);
    }

	/**
	 * Retrieve a single entity by values
	 */
    public function findOneBy($model, $field, $value, array $options)
    {
    	
    }

	/**
	 * Retrieve a collection of records
	 */
    public function findAll($model, array $options)
    {

    }
 
	/**
	 * Retrieve a collection of records by 
	 */
    public function findAllBy($model, $field, $value, array $options)
    {
    	
    }

	/**
	 * Retrieve paginated records
	 */
    public function paginate($model, $perPage = 15, array $options)
    {
    	
    }
 
	/**
	 * Create a record
	 */
    public function create($model, array $data)
    {
    	
    }
 
	/**
	 * Update the record
	 */
    public function update($model, $id, array $data)
    {
    	
    }
 
	/**
	 * Delete the record
	 */
    public function delete($model, $id)
    {
    	
    }

}
