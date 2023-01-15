@extends('layouts.app')
@section('content')
<div class="mt-5 px-8">
    <h1 class="font-bold text-2xl text-gray-900">Dashboard</h1>
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-gray-900">Vote Dashboard</h1>
        <span onclick="toogleForm()" class="px-10 cursor-pointer py-2.5 rounded-md bg-green-500 text-white font-bold">Add new</span>
    </div>
</div>
@endsection
