<?php


namespace App\Repository;


interface Repository
{
    public function getAll();

    public function findByid($id);

    public function update($data, $object);

    public function create($data);

    public function delete($object);
}
