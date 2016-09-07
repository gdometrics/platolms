<?php 

namespace App\Repositories;

class Repository
{

	/**
	 * Retrieve a single entity
	 */
    public function find($model, $idOrIds)
    {
    	return $model::find($idOrIds);
    }

	/**
	 * Retrieve a single entity by values
	 */
    public function findOneBy($model, $field, $value)
    {
    	return $model::where($field, $value)->first();
    }

	/**
	 * Retrieve a collection of records
	 */
    public function findAll($model)
    {
        return $model::all();
    }

	/**
	 * Retrieve a collection of records by 
	 */
    public function findAllBy($table, $scopes)
    {
    	return \DB::table($table)->where($scopes)->get();
    }

	/**
	 * Retrieve paginated records
	 */
    public function paginate($table, $scopes, $perPage, $withTrashed)
    {
    	if ($withTrashed)
    	{
	    	return \DB::table($table)->where($scopes)->withTrashed()->paginate($perPage);
    	}

    	return \DB::table($table)->where($scopes)->paginate($perPage);
    }
 
	/**
	 * Create a record
	 */
    public function create($table, array $data)
    {
        unset($data['_token']);
    	return \DB::table($table)->insertGetId($data);
    }
 
	/**
	 * Update the record
	 */
    public function update($model, $id, array $data)
    {
    	return $model::where('id', $id)->update($data);
    }

	/**
	 * Delete the record
	 */
    public function delete($model, $idOrIds)
    {
    	return $model::destroy($idOrIds);
    }

}
