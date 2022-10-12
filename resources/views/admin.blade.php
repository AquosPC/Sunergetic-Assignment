@extends('layout')

@section('content')
    <div class="bg-white w-1/3 mx-auto mt-24 rounded-xl">
        <div class="px-4 pt-3">
            <a href="/"><- go back</a>
        </div>
        <div class="text-center px-16 pb-5 pt-16">
            <a href="/admin/create">
                <div class="bg-emerald-500 w-fit p-4 rounded-xl">
                    <h1 class="text-white">Add customer</h1>
                </div>
            </a>
        </div>
        <div class="pb-16">
            <table class="table-fixed space-x-3 border-separate border-spacing-y-2 border-spacing-x-1 mx-auto">
                <thead>
                   <tr>
                        <th class="px-6 border border-emerald-500">E-mail</th>
                        <th class="px-6 border border-emerald-500">Firstname</th>
                        <th class="px-6 border border-emerald-500">Lastname</th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach ($response->data as $item)
                        <tr>
                            <td class="px-6 border border-emerald-500">{{$item->email}}</td>
                            <td class="px-6 border border-emerald-500">{{$item->firstname}}</td>
                            <td class="px-6 border border-emerald-500">{{$item->lastname}}</td>
                            <td class="px-6 text-center"><a href="/admin/view/{{$item->id}}"><img src="{{asset('img/icons/eye-solid.svg')}}" class="h-4 mx-auto" alt=""></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection