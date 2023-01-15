@extends('layouts.app')
@section('content')
<div class="mt-5 px-8">
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-gray-900">Official Overview</h1>
        <span onclick="toogleForm()" class="px-10 cursor-pointer py-2.5 rounded-md bg-green-500 text-white font-bold">Add new</span>
    </div>
    {{-- @php
        dd($officals);
    @endphp --}}
    <div class="mt-4">
        <table class="w-full">
            <tbody>
                {{-- {{ dd($officals->count()) }} --}}
                @if ($officals->count() > 0)
                @foreach ($officals as $official)
                @php
                // dd($official->id);
                // use App\Http\Models\Official;
                $user = App\Models\Official::where('user_id',$official->id)->first();
                    // dd($user);
                @endphp
                {{-- {{ dd($official->is_disabled); }} --}}
                <tr class="border-b-2 border-gray-500">
                    <td class="p-3 bg-green-200 font-semibold text-md">{{ $official->username }}</td>
                    <td class="p-3 bg-gray-200 font-semibold text-md">{{ $user->assigned_faculty }}</td>
                    <td class="p-3 bg-gray-200 font-semibold text-md">{{ $user->phone_number }}</td>
                    <td class="p-3 bg-gray-100 font-semibold text-md">Campus: {{ $user->campus }}</td>
                    <td class="p-3 bg-gray-200 font-semibold text-md"> <a href="/official/password/{{ $official->id }}" class="bg-green-500 rounded-md text-white px-8 py-2.5">Change Password</a> </td>
                    <td class="p-3 bg-gray-200 font-semibold text-md"> <a href="/disable/{{ $official->id }}" class="@if($official->is_disabled == true) bg-green-500 @else bg-red-500 @endif rounded-md text-white px-8 py-2.5">@if($official->is_disabled == true) Enable @else Disable @endif Account</a> </td>
                    {{-- <td class="p-3 bg-gray-100 font-semibold text-md"></td> --}}
                </tr>
                @endforeach
                @else
                <p>No officials has been registered</p>

                @endif
            </tbody>
        </table>
    </div>
</div>
<div id="official" class="absolute hidden bg-gray-500 bg-opacity-50 h-full w-full top-0 left-0">
    <div class="mt-20 w-96 rounded-md mx-auto bg-white p-5 h-96 overflow-y-scroll">
        <div class="flex justify-end">
            <i onclick="toogleForm()" class="fa fa-window-close"></i>
        </div>
        <h1 class="font-bold text-2xl text-gray-900">Add new official</h1>
        <form action="{{ route('official_overview') }}" method="post" class="mt-4">
            @csrf
            <input type="text" name="name" id="" value="{{ old('name') }}" class="block px-3 py-4 border-2 border-gray-800 rounded-md w-full mb-2" placeholder="Fullname">
            @error('name')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
            <input type="text" name="phone_number" value="{{ old('phone_number') }}" id="" class="block px-3 py-4 border-2 border-gray-800 mb-2 rounded-md w-full" placeholder="Phone number">
            @error('phone_number')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
            <input type="text" name="campus" value="{{ old('campus') }}" id="" class="block px-3 py-4 border-2 border-gray-800 mb-2 rounded-md w-full" placeholder="Campus">
            @error('campus')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
            <input type="email" name="email" id="" value="{{ old('email') }}" class="block px-3 py-4 border-2 border-gray-800 mb-2 rounded-md w-full" placeholder="Email address">
            @error('email')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
            <input type="text" name="username" value="{{ old('username') }}" id="" class="block px-3 py-4 border-2 border-gray-800 mb-2 rounded-md w-full" placeholder="Username">
            @error('username')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
            <input type="text" value="{{ old('faculty') }}" name="faculty" id="" class="block px-3 py-4 border-2 border-gray-800 mb-2 rounded-md w-full" placeholder="Faculty to be assigned">
            @error('faculty')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
            <input type="submit" value="Submit" class="px-8 py-2.5 bg-gray-800 text-white rounded-md">
        </form>
    </div>
</div>
<script>
function toogleForm(){
    document.getElementById("official").classList.toggle("hidden");
}
</script>
@endsection
