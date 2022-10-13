@extends('layout')

@section('content')
    <div class="bg-white w-1/3 mx-auto mt-24 rounded-xl">
        <div class="mx-auto text-center pt-5">
            <h1 class="text-3xl font-bold text-red-500">Are you sure you wanna delete customer with ID:{{$id}}?</h1>
        </div>
        <div class="flex flex-row">
            <div class="text-center px-16 pb-5 pt-16 mx-auto">
                <a href="{{ url()->previous() }}">
                    <div class="bg-emerald-500 w-fit p-4 rounded-xl">
                        <h1 class="text-white">Go back</h1>
                    </div>
                </a>
            </div>
            <div class="mx-auto">
                <form method="POST" action="/admin/delete/{{$id}}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="text-center px-16 pb-5 pt-16 mx-auto">
                        <input type="hidden" value="{{$id}}">
                        <button class="text-white bg-red-500 w-fit p-4 rounded-xl" type="submit">Yes, delete customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection