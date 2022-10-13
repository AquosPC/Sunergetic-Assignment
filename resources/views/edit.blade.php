@extends('layout')

@section('content')
    <div class="bg-white w-1/3 mx-auto mt-24 rounded-xl">
        <div class="px-4 pt-3">
            <a href="/admin"><- go back</a>
        </div>
        <form method="POST" action="/admin/edit/customer" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-row">
                <div class="text-center px-16 pb-5 pt-16">
                    <button class="text-white bg-emerald-500 w-fit p-4 rounded-xl" type="submit">Save customer</button>
                </div>
            </div>
            <div class="flex flex-row pt-10">
                <div class="pb-16 pl-10 text-xl font-bold space-y-3">
                    <h1>Email:</h1>
                    <h1>Firstname:</h1>
                    <h1>Lastname:</h1>
                    <h1>Address:</h1>
                    <h1>Zipcode:</h1>
                    <h1>City:</h1>
                    <h1>Phone:</h1>
                </div>
                    <div class="pb-16 pl-10 text-xl space-y-2 flex flex-col">
                        <input type="hidden" name="id" value="{{$response->id}}">
                        <input class="border-2 border-emerald-500" type="email" name="email" value="{{$response->email}}">
                        <input class="border-2 border-emerald-500" type="text" name="firstname" value="{{$response->firstname}}">
                        <input class="border-2 border-emerald-500" type="text" name="lastname" value="{{$response->lastname}}">
                        <input class="border-2 border-emerald-500" type="text" name="address" value="{{$response->address}}">
                        <input class="border-2 border-emerald-500" type="text" name="zipcode" value="{{$response->zipcode}}">
                        <input class="border-2 border-emerald-500" type="text" name="city" value="{{$response->city}}">
                        <input class="border-2 border-emerald-500" type="text" name="phone" value="{{$response->phone}}">
                    </div>
            </div>
        </form>
    </div>
@endsection