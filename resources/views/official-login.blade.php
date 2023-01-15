@extends('layouts.official-layout')
@section('official-content')
<div class="mt-5 px-8">
    <h1 class="font-bold text-2xl text-gray-900">Dashboard</h1>
    <div class="flex flex-wrap gap-y-8 gap-x-8 mt-6 items-center">
        <div class="w-72 flex justify-between items-center shadow-md bg-green-500 text-purple-100 p-7 rounded-md">
            <div>
                <h1 class="text-xl font-semibold">
                    Number of <br> Candidates
                </h1>
                <h1 class="text-6xl font-bold mt-2">{{ $electorate }}</h1>
            </div>
            <div class="bg-green-800 rounded-full flex justify-center items-center w-16 h-16">
                <i class="fa text-3xl fa-user-tie"></i>
            </div>
        </div>
        <div class="w-72 flex justify-between items-center shadow-md bg-yellow-500 text-purple-100 p-7 rounded-md">
            <div>
                <h1 class="text-xl font-semibold">
                    Accredited <br> Voters
                </h1>
                <h1 class="text-6xl font-bold mt-2">{{ $voters }}</h1>
            </div>
            <div class="bg-yellow-800 rounded-full flex justify-center items-center w-16 h-16">
                <i class="fa text-3xl fa-user-check"></i>
            </div>
        </div>
        <div class="w-72 flex justify-between items-center shadow-md bg-red-500 text-purple-100 p-7 rounded-md">
            <div>
                <h1 class="text-xl font-semibold">
                    All <br> Voters
                </h1>
                <h1 class="text-6xl font-bold mt-2">{{ $voted }}</h1>
            </div>
            <div class="bg-red-800 rounded-full flex justify-center items-center w-16 h-16">
                <i class="fa text-3xl fa-vote-yea"></i>
            </div>
        </div>
    </div>
    <hr class="mt-6">
    {{-- <h1 class="font-bold text-2xl mt-6 text-gray-900">Last Presidential Election Result</h1>
    <div class="mt-6">
        {{-- <div class="bg-white p-8 rounded-md shadow-md">
            {!! $chart->container() !!}
        </div> --}}
    {{-- </div> --}}
{{-- </div>  --}}
<script src="{{ asset('js/apexcharts.js') }}"></script>

{{-- {{ $chart->script() }} --}}
@endsection
