<?php


namespace App\Repository\Eloquent;


use App\Repository\Repository;

abstract class RepositoryEloquent implements Repository
{
    protected $model;
    public function __construct()
    {
        $this->model = $this->setModel();
    }

    abstract public function getModel();

    public function setModel(){
        return $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        $result = $this->model->all();
        return $result;
    }

    public function findByid($id)
    {
       return $result = $this->model->find($id);

    }

    public function create($data)
    {
       return $newCustomer = $this->model->create($data);

    }

    public function delete($object)
    {
        return $object->delete();
    }

    public function update($data, $object)
    {

       $object->update($data);
        return $object;

    }
}
