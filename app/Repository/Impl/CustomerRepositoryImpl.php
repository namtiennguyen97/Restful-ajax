<?php


namespace App\Repository\Impl;


use App\Models\Customer;
use App\Repository\CustomerRepository;
use App\Repository\Eloquent\RepositoryEloquent;

class CustomerRepositoryImpl extends RepositoryEloquent implements CustomerRepository
{
    public function getModel()
    {
        $model = Customer::class;
        return $model;
    }
}
