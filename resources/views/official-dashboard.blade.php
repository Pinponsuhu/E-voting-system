@extends('layouts.official-layout')
@section('official-content')
    <div>
        <form action="{{ route('votersPage') }}" class="mt-12 block w-80 md:w-96 bg-white mx-auto p-6 rounded-md shadow-md" method="POST">

            <div>
                <img src="{{ asset('img/lasu.png') }}" class="w-16 h-16" alt="">
                <h1 class="text-3xl text-gray-900 font-bold mt-1">Election portal Page</h1>
                <hr class="my-5">
            </div>
            @csrf
            @if(Session('message'))
            <h1 class="text-xl font-bold mb-0.5 text-red-500">Oops</h1>
                <p class="text-red-500">{{ Session('message') }}</p>
            @endif
            <div class="my-3">
                <label for="" class="block font-semibold mb-3">Matric number</label>
                <input type="text" name="matric_number" class="p-3 rounded-md border-2 block w-full">
                @error('matric_number')
                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-3">
                <label for="" class="block font-semibold mb-3">Pin</label>
                <input type="password" name="pin" class="p-3 rounded-md border-2 block w-full">
                @error('pin')
                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                @enderror
            </div>
            <button class="bg-blue-500 py-3 px-8 rounded-md text-white">Continue</button>
        </form>
    </div>
@endsection
