@extends('layouts.app')
@section('content')
    <div class="mt-5 px-8">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-2xl text-gray-900">Voters List</h1>
            <span onclick="toogleForm()" class="py-3 px-8 bg-green-500 cursor-pointer text-white rounded-md">Accreditate User</span>
        </div>

        <div class="mt-6 bg-white p-6 rounded-md shadow-md">
            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-gray-800">
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Matric Number</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Email</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-200">Accreditation Location</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Status</td>
                        <td class="font-semibold text-lg  p-3 bg-gray-100">Time Accredited</td>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($voters as $voter)
                   <tr>
                    <td class="font-semibold text-lg  p-3 bg-gray-100">{{ $voter->matric_no }}</td>
                    <td class="font-semibold text-lg  p-3 bg-gray-100">{{ $voter->email }}</td>
                    <td class="font-semibold text-lg  p-3 bg-gray-200">Art</td>
                    <td class="font-semibold text-lg  p-3 bg-gray-100">{{ $voter->status }}</td>
                    <td class="font-semibold text-lg  p-3 bg-gray-200">12:39 PM</td>
                </tr>
                   @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div id="voters-form" class="absolute hidden bg-gray-500 bg-opacity-50 h-full w-full top-0 left-0">
        <div class="mt-20 w-96 rounded-md mx-auto bg-white p-5 h-96 overflow-y-scroll">
            <div class="flex justify-end">
                <i onclick="toogleForm()" class="fa fa-window-close"></i>
            </div>
            <h1 class="font-bold text-2xl mb-6 text-gray-900">Add new official</h1>
           <form action="/add/voters/{{ $election }}" method="post">
            @csrf
            <input type="text" name="matric_number" id="" value="{{ old('matric_number') }}" class="block px-3 py-4 border-2 border-gray-800 rounded-md w-full mb-2" placeholder="Matric Number">
            @error('matric_number')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
            <input type="email" name="email" pattern="[a-z].[a-z0-9.]+@[st.lasu.edu]+.[ng]" id="" value="{{ old('email') }}" class="block px-3 py-4 border-2 border-gray-800 rounded-md w-full mb-2" placeholder="Student email">
            @error('email')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
            <input type="submit" value="Submit" class="px-8 py-2.5 bg-gray-800 text-white rounded-md">
           </form>

        </div>
    </div>
    <script>
        function toogleForm(){
            document.getElementById("voters-form").classList.toggle("hidden");
        }
        </script>
@endsection
