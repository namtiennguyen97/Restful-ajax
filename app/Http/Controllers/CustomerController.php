<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Service\Impl\CustomerServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerServiceImpl $customerServiceImpl)
    {
        $this->customerService = $customerServiceImpl;
    }
    public function index(){
       return $customer = $this->customerService->getAll();
    }
    public function update(Request $request, $id){
        $customer = Customer::find($id);
        $customerImage = $customer->image;
        if ($customerImage){
            Storage::delete('public/'.$customerImage);
        }
        if ($request->hasFile('image')){
            $image1 = $request->file('image');
            $path = $image1->store('images/','public');
             $newCustomer = $this->customerService->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'image' => $path,
                'department_id' => $request->department_id
            ], $id);
            return $newCustomer;
        }

    }

    public function create(Request $request){
        if ($request->hasFile('image')){
            $image1 = $request->file('image');
            $path = $image1->store('images/','public');
            $newCustomer = $this->customerService->create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'image' => $path,
                'department_id' => $request->input('department_id')
            ]);
            return $newCustomer;
        }

    }

    public function delete($id){
        $currentCustomer = $this->customerService->findById($id);
        $currentImage = $currentCustomer->image;
        if ($currentImage){
            Storage::delete('public/'.$currentImage);
        }

        $this->customerService->delete($currentCustomer);
    }

    public function customerShow($id){
        return $customer = $this->customerService->findById($id);
    }


}
