<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

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

    public function showEditCustomer($id)
    {
        $response = Http::get('https://assignment.sunergetic.nl/api/v1/customers/'.$id, [
            'token' => 'UiaExFiiH11aIRk0cxa1oxpauEQGv1'
        ]);

        $data = json_decode($response);

        return view('edit', [
            'response' => $data->data
        ]);
    }

    public function editCustomer(Request $request)
    {
        Http::put('https://assignment.sunergetic.nl/api/v1/customers/'.$request->id, [
            'token' => 'UiaExFiiH11aIRk0cxa1oxpauEQGv1',
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'phone' => $request->phone,
        ]);

        return redirect('/admin/view/'.$request->id);
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
        $formfields = $request->validate([
            'firstname' => ['required', 'min:3'],
            'email'=> ['required', 'email'],
        ]);


        Http::post('https://assignment.sunergetic.nl/api/v1/customers', [
            'token' => 'UiaExFiiH11aIRk0cxa1oxpauEQGv1',
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'phone' => $request->phone,
        ]);

        return redirect('/admin');
    }

    public function deleteCustomer($id)
    {
        Http::delete('https://assignment.sunergetic.nl/api/v1/customers/'.$id, [
            'token' => 'UiaExFiiH11aIRk0cxa1oxpauEQGv1',
        ]);

        return redirect('/admin');
    }

    public function showDeleteCustomer($id)
    {
        return view('delete', [
            'id' => $id
        ]);
    }


}
