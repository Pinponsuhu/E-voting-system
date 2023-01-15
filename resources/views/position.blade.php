@extends('layouts.app')
@section('content')
    <div class="mt-5 px-8">
        <h1 class="font-bold text-2xl text-gray-900">Positions</h1>

        <div class="mt-6 bg-white p-6 rounded-md shadow-md">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-gray-800">
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Position</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Status</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Created at</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Last Eection Held</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Presidency</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Open</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">December 31st 1999</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">June 21st 2022</td>
                        <td class=" p-3">
                            <a href="" class="bg-green-500 font-semibold text-gray-100 py-2.5 px-8 rounded-md">History</a>
                        </td>
                        <td class="p-3  flex gap-x-3">
                            <a href="" class="bg-blue-500 font-semibold text-gray-100 py-2.5 px-8 rounded-md">Edit</a>
                            <a href="" class="bg-red-500 font-semibold text-gray-100 py-2.5 px-8 rounded-md">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Kini Kan</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Open</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">December 31st 1999</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">June 21st 2022</td>
                        <td class=" p-3">
                            <a href="" class="bg-green-500 font-semibold text-gray-100 py-2.5 px-8 rounded-md">History</a>

                        </td>
                        <td class="p-3  flex gap-x-3">
                            <a href="" class="bg-blue-500 font-semibold text-gray-100 py-2.5 px-8 rounded-md">Edit</a>
                            <a href="" class="bg-red-500 font-semibold text-gray-100 py-2.5 px-8 rounded-md">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
