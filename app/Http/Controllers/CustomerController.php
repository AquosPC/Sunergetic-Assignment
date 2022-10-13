<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{

    //Gets a list of customers and decodes json and put it in a variable and brings the user to the admin page
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

    //Gets specific customer by id and decodes json and put it in a variable and brings the user to the view page
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

    //brings the user to the edit page with a get request about the specific customer to edit
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

    //updates the edited customer information and bring the user back to the view page
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

    //shows the create page
    public function showCreateCustomer()
    {
        return view('create');
    }

    //Creates new customer with the information provided and redirects the user to admin page
    public function createCustomer(Request $request)
    {
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

    //Deletes customer information by id
    public function deleteCustomer($id)
    {
        Http::delete('https://assignment.sunergetic.nl/api/v1/customers/'.$id, [
            'token' => 'UiaExFiiH11aIRk0cxa1oxpauEQGv1',
        ]);

        return redirect('/admin');
    }

    //Shows the delete warning page with id information
    public function showDeleteCustomer($id)
    {
        return view('delete', [
            'id' => $id
        ]);
    }


}
