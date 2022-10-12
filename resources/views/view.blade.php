@extends('layout')

@section('content')
    <div class="bg-white w-1/3 mx-auto mt-24 rounded-xl">
        <div class="px-4 pt-3">
            <a href="/admin"><- go back</a>
        </div>
        <div class="flex flex-row">
            <div class="text-center px-16 pb-5 pt-16">
                <a href="#edit-customer">
                    <div class="bg-emerald-500 w-fit p-4 rounded-xl">
                        <h1 class="text-white">Edit customer</h1>
                    </div>
                </a>
            </div>
            <div class="text-center px-16 pb-5 pt-16">
                <a href="#delete-customer">
                    <div class="bg-red-500 w-fit p-4 rounded-xl">
                        <h1 class="text-white">Delete customer</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex flex-row pt-10">
            <div class="pb-16 pl-10 text-xl font-bold space-y-2">
                <h1>ID:</h1>
                <h1>Email:</h1>
                <h1>Firstname:</h1>
                <h1>Lastname:</h1>
                <h1>Address:</h1>
                <h1>Zipcode:</h1>
                <h1>City:</h1>
                <h1>Phone:</h1>
                <p>Created at:</p>
                <p>Last time updated:</p>
            </div>
            <div class="pb-16 pl-10 text-xl space-y-2">
                <h1>{{$response->id}}</h1>
                <h1>{{$response->email}}</h1>
                <h1>{{$response->firstname}}</h1>
                <h1>{{$response->lastname}}</h1>
                <h1>{{$response->address}}</h1>
                <h1>{{$response->zipcode}}</h1>
                <h1>{{$response->city}}</h1>
                <h1>{{$response->phone}}</h1>
                <p>{{date('d-m-Y', strtotime($response->created_at))}}</p>
                <p>{{date('d-m-Y', strtotime($response->updated_at))}}</p>
            </div>
        </div>
    </div>
@endsection