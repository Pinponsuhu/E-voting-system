@extends('layouts.app')
@section('content')
<div class="mt-5 px-8">
    <h1 class="font-bold text-2xl text-gray-900">Dashboard</h1>
    <div class="p-8 rounded-md bg-white shadow-md">
        <form action="{{ route('view_password') }}" method="post">
            @csrf
            @if(Session('message'))
        <h1 class="text-xl font-bold mb-0.5 text-red-500">Oops</h1>
            <p class="text-red-500 mb-4">{{ Session('message') }}</p>
        @endif
            <input type="password" placeholder="Old Password" class="py-3.5 px-4 bg-gray-100 rounded-md shadow-md block mb-3 w-80" name="old_password" id="">
            @error('old_password')
                <p class="my-3 text-red-500">{{ $message }}</p>
            @enderror
            <input type="password" placeholder="New Password" class="py-3.5 px-4 bg-gray-100 rounded-md shadow-md block mb-3 w-80" name="password" id="">
            @error('password')
                <p class="my-3 text-red-500">{{ $message }}</p>
            @enderror
            <input type="password" placeholder="Repeat New Password" class="py-3.5 px-4 bg-gray-100 rounded-md shadow-md block mb-6 w-80" name="password_confirmation" id="">
            <button class="px-8 py-3 text-white rounded-md bg-gray-800">Submit</button>
        </form>
    </div>
</div>
@endsection
