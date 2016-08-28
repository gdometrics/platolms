<?php 

namespace App\Repositories;

class Repository
{

	/**
	 * Retrieve a single entity
	 */
    public function find($model, $idOrIds, array $options)
    {
    	return $model::find($idOrIds);
    }

	/**
	 * Retrieve a single entity by values
	 */
    public function findOneBy($model, $field, $value, array $options)
    {
    	return $model::where($field, $value)->first();
    }

	/**
	 * Retrieve a collection of records
	 */
    public function findAll($model, array $options)
    {
		//orderBy('name', 'desc')
        //take(10)
        return $model::all();
    }

	/**
	 * Retrieve a collection of records by 
	 */
    public function findAllBy($table, $scopes, array $options)
    {
    	return \DB::table($table)->where($scopes)->get();
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
    public function delete($model, $idOrIds)
    {
    	return $model::destroy($idOrIds);
    }

}
