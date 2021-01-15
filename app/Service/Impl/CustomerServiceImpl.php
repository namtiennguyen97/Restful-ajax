<?php


namespace App\Service\Impl;


use App\Repository\Impl\CustomerRepositoryImpl;
use App\Service\CustomerService;

class CustomerServiceImpl implements CustomerService
{
    protected $customerRepository;
    public function __construct(CustomerRepositoryImpl $customerRepositoryImpl)
    {
        $this->customerRepository = $customerRepositoryImpl;
    }

    public function getAll()
    {
        $result = $this->customerRepository->getAll();
        return $result;
    }

    public function create($request)
    {
        return $this->customerRepository->create($request);
    }

    public function update($request, $id)
    {
       $oldCustomer= $this->customerRepository->findByid($id);
       return $newCustomer = $this->customerRepository->update($request, $oldCustomer);
    }

    public function delete($id)
    {
//        $currentCustomer = $this->customerRepository->findByid($id);
        $this->customerRepository->delete($id);
    }

    public function findById($id)
    {
        $customer = $this->customerRepository->findByid($id);
        return $customer;
    }
}
