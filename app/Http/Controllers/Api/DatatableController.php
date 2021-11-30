<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatatableController extends Controller
{

    public function getCustomers()
    {
        return datatables(\App\Models\Customer::select('id','name','surname','email'))
            ->setRowClass(function ($customer){
                return $customer->id % 2 == 0 ? 'text-success' : 'text-danger';
            })
            ->toJson();
    }

}
