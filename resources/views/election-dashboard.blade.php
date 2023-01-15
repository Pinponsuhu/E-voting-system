@extends('layouts.app')
@section('content')
<div class="mt-5 px-8">
    <div class="flex items-center justify-between">
        <h1 class="font-bold text-2xl text-gray-900">Election Overview</h1>
        {{-- <div class="flex gap-x-3 items-center">
            <a href="" class="bg-blue-500 font-semibold text-white px-12 py-3 rounded-md">Add Candidate</a>
            <span id="add-election" class="py-3 font-semibold cursor-pointer hover:bg-green-600 px-8 rounded-md text-white bg-green-500">Edit Election</span>
        </div> --}}
    </div>
    <div class="mt-12 p-6 bg-white rounded-md">

        @if ($elections->count() <= 0)
        <p class="text-xl font-bold">No pass records was found</p>
        @else
        <table class="w-full">
            @foreach ($elections as $election)
                <tr class="border-b-2 border-gray-500">
                    <td class="p-3 bg-green-200 font-semibold text-md">{{ $election->election_date }}</td>
                    <td class="p-3 bg-gray-200 font-semibold text-md">{{ $election->starting_time }}</td>
                    <td class="p-3 bg-gray-200 font-semibold text-md">{{ $election->closing_time }}</td>
                    <td class="p-3 bg-gray-100 font-semibold text-md">{{ $election->status }}</td>
                    <td class="p-3 bg-gray-200 font-semibold text-md"><a href="/election/{{ $election->id }}" class="py-2.5 px-8 bg-green-500 text-white rounded-md">More</a></td>
                    {{-- <td class="p-3 bg-gray-100 font-semibold text-md"></td> --}}
                </tr>
        @endforeach
        </table>
        @endif
    </div>
</div>
@endsection
