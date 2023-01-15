@extends('layouts.app')
@section('content')
    <div class="mt-5 px-8">
        <h1 class="font-bold text-2xl text-gray-900">Voters List</h1>

        <div class="mt-6 bg-white p-6 rounded-md shadow-md">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-gray-800">
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Matric Number</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Location</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Candidate</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Time Voted</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">170591087</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Art</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Pinponsuhu Joseph</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">12:39 PM</td>
                    </tr>
                    <tr>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">170591085</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Science</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Pinponsuhu Joseph</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">12:35 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
