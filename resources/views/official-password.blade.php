@extends('layouts.app')
@section('content')
<div class="p-8 rounded-md mt-6 bg-white shadow-md">
    <h1 class="text-xl font-bold mb-5 text-gray-800">Change Password</h1>
    <form action="/official/password/{{ $id }}" method="post">
        @csrf
        <input type="password" placeholder="New Password" class="py-3.5 px-4 bg-gray-100 rounded-md shadow-md block mb-3 w-80" name="password" id="">
        @error('password')
            <p class="my-3 text-red-500">{{ $message }}</p>
        @enderror
        <input type="password" placeholder="Repeat New Password" class="py-3.5 px-4 bg-gray-100 rounded-md shadow-md block mb-6 w-80" name="password_confirmation" id="">
        <button class="px-8 py-3 text-white rounded-md bg-gray-800">Submit</button>
    </form>
</div>
@endsection
