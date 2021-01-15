<?php


namespace App\Service;


interface RepositoryService
{
public function getAll();
public function create($request);
public function update($request, $id);
public function delete($id);
public function findById($id);
}
