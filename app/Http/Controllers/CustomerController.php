<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function getCustomerList()
    {
        $response = Http::get('https://assignment.sunergetic.nl/api/v1/customers', [
            'token' => 'UiaExFiiH11aIRk0cxa1oxpauEQGv1'
        ]);

        $data = json_decode($response);

        return view('admin', [
            'response' => $data
        ]);
    }

    public function getCustomer($id)
    {
        $response = Http::get('https://assignment.sunergetic.nl/api/v1/customers/'.$id, [
            'token' => 'UiaExFiiH11aIRk0cxa1oxpauEQGv1'
        ]);

        $data = json_decode($response);

        return view('view', [
            'response' => $data->data
        ]);
    }

    public function showCreateCustomer()
    {
        // $response = Http::get('https://assignment.sunergetic.nl/api/v1/customers/'.$id, [
        //     'token' => 'UiaExFiiH11aIRk0cxa1oxpauEQGv1'
        // ]);

        // $data = json_decode($response);

        return view('create');
    }

    public function createCustomer(Request $request)
    {
        $response = Http::post('https://assignment.sunergetic.nl/api/v1/customers', [
            'token' => 'UiaExFiiH11aIRk0cxa1oxpauEQGv1',
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'phone' => $request->phone,
        ]);

        return view('/admin/create');
    }
}
