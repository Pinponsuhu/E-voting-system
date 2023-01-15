@extends('layouts.app')
@section('content')
<div class="mt-5 px-8">
    <div class="flex items-center justify-between">
        <h1 class="font-bold text-2xl text-gray-900">Election</h1>
        <div class="flex gap-x-3 items-center">
            <a href="/election/dashboard" class="bg-blue-500 font-semibold text-white px-12 py-3 rounded-md">View All</a>
            <span onclick="toggleForm()" class="py-3 font-semibold cursor-pointer hover:bg-green-600 px-8 rounded-md text-white bg-green-500">Start New</span>
        </div>
    </div>

    <div class="mt-6 mb-4 bg-white p-6 rounded-md shadow-md">

        @if ($election > 0)

        <div id="charts ojo">
            <div class="grid grid-cols-2 items-start gap-x-8">
                <div>
                    {!! $chart->container() !!}
                </div>
                <div>
                    {!! $chart2->container() !!}
                </div>
            </div>
        </div>

        @else
            <div>
                <p class="text-xl font-bold">No pass records was found</p>
            </div>
        @endif


    </div>
    <div class="mt-6 bg-white p-6 rounded-md shadow-md">
        <div class="flex items-center justify-between">
            <h1 class="font-bold text-2xl text-gray-900">All Past Election Results</h1>
        </div>
        {{-- {{ dd($presidency) }} --}}
        <div class="mt-4">
            <table class="w-full">
                <tbody>
                    <tr class="border-b-2 border-gray-500">
                        <td class="p-3 bg-green-200 font-semibold text-md">Presidency</td>
                        @foreach ($presidency as $president)
                        @php
                            $p_count = App\Models\VotingHistory::where('presidency',$president->id)->count();

                            // dd($p_count);
                        @endphp
                        <td class="p-3 bg-gray-100 font-semibold text-md">{{ $president->fullname }}: {{ $p_count }}</td>
                        @endforeach
                    <tr class="border-b-2 border-gray-500">
                        <td class="p-3 bg-green-200 font-semibold text-md">Vice Presidency(Ojo)</td>
                        @foreach ($ojos as $ojo)
                        @php
                            $ojo_c = App\Models\VotingHistory::where('ojo',$ojo->id)->count();

                            // dd($p_count);
                        @endphp
                        <td class="p-3 bg-gray-200 font-semibold text-md">{{ $ojo->fullname }}: {{ $ojo_c }}</td>

                        @endforeach
                    </tr>
                    <tr class="border-b-2 border-gray-500">
                        <td class="p-3 bg-green-200 font-semibold text-md">Vice Presidency(Epe)</td>
                        @foreach ($epes as $epe)
                        @php
                            $epe_c = App\Models\VotingHistory::where('epe',$epe->id)->count();

                            // dd($p_count);
                        @endphp
                        <td class="p-3 bg-gray-200 font-semibold text-md">{{ $epe->fullname }}: {{ $epe_c }}</td>

                        @endforeach
                    </tr>
                    <tr class="border-b-2 border-gray-500">
                        <td class="p-3 bg-green-200 font-semibold text-md">Vice Presidency(Ikeja)</td>
                        @foreach ($ikejas as $ikeja)
                        @php
                            $ikeja_c = App\Models\VotingHistory::where('ikeja',$ikeja->id)->count();

                            // dd($p_count);
                        @endphp
                        <td class="p-3 bg-gray-200 font-semibold text-md">{{ $ikeja->fullname }}: {{ $ikeja_c }}</td>

                        @endforeach
                    </tr>
                    <tr class="border-b-2 border-gray-500">
                        <td class="p-3 bg-green-200 font-semibold text-md">Treasurer</td>
                        @foreach ($tresurers as $tresurer)
                        @php
                            $tresurer_c = App\Models\VotingHistory::where('tresurer',$tresurer->id)->count();

                            // dd($p_count);
                        @endphp
                        <td class="p-3 bg-gray-100 font-semibold text-md">{{ $tresurer->fullname }}: {{ $tresurer_c }}</td>
                        @endforeach
                    </tr>
                    <tr class="border-b-2 border-gray-500">
                        <td class="p-3 bg-green-200 font-semibold text-md">Gen. Secretary</td>
                        @foreach ($gen_secs as $gen_sec)
                        @php
                            $gen_sec_c = App\Models\VotingHistory::where('gen_sec',$gen_sec->id)->count();

                            // dd($p_count);
                        @endphp
                        <td class="p-3 bg-gray-200 font-semibold text-md">{{ $gen_sec->fullname }}: {{ $gen_sec_c }}</td>
                        @endforeach

                    </tr>
                    <tr class="border-b-2 border-gray-500">
                        <td class="p-3 bg-green-200 font-semibold text-md">Ass. Gen. Secretary</td>
                        @foreach ($ass_secs as $ass_sec)
                        @php
                        $ass_sec_c = App\Models\VotingHistory::where('ass_gen_sec',$ass_sec->id)->count();

                        // dd($p_count);
                        @endphp
                        <td class="p-3 bg-gray-200 font-semibold text-md">{{ $ass_sec->fullname }}: {{ $ass_sec_c }}</td>
                        @endforeach
                    </tr>
                    <tr class="border-b-2 border-gray-500">
                        <td class="p-3 bg-green-200 font-semibold text-md">Welfare Director</td>
                        @foreach ($welfares as $welfare)
                        @php
                        $welfare_c = App\Models\VotingHistory::where('welfare',$welfare->id)->count();

                        // dd($p_count);
                        @endphp
                        <td class="p-3 bg-gray-100 font-semibold text-md">{{ $welfare->fullname }}: {{ $welfare_c }}</td>
                        @endforeach
                    </tr>
                    <tr class="border-b-2 border-gray-500">
                        <td class="p-3 bg-green-200 font-semibold text-md">Social Director</td>
                        @foreach ($socials as $social)
                        @php
                        $social_c = App\Models\VotingHistory::where('social',$social->id)->count();

                        // dd($p_count);
                        @endphp
                        <td class="p-3 bg-gray-200 font-semibold text-md">{{ $social->fullname }}: {{ $social_c }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="new-election" class="fixed hidden top-0 left-0 bg-gray-900 bg-opacity-80 h-screen w-screen flex justify-center items-center">
            <div class="w-80 md:w-5/12 bg-white rounded-md p-6">
                <div class="flex justify-end mb-4">
                    <span onclick="toggleForm()" id="close-election" class="fa fa-window-close text-2xl"></span>
                </div>
                <h1 class="text-2xl font-bold mb-2">Initiate new election</h1>
                <hr class="mb-4">
                <form action="{{ route('election') }}" method="post">
                    @csrf
                    <label for="" class="block mb-2 font-semibold">Election Date</label>
                    <input type="date"  name="election_date" id="" class="block w-full p-3 border-l-4 border-gray-900">
                    @error('election_date')
                        <p class="text-red-500 text-sm my-3">{{ $message }}</p>
                    @enderror
                    <div class="md:grid md:grid-cols-2 gap-x-2">
                        <div class="mt-3">
                            <label for="" class="block mb-2 font-semibold">Start Time</label>
                            <input type="time" name="starting_time" id="" class="block w-full p-3 border-l-4 border-gray-900">
                        </div>
                        <div class="mt-3">
                            <label for="" class="block mb-2 font-semibold">Closing Time</label>
                            <input type="time" name="closing_time" id="" class="block w-full p-3 border-l-4 border-gray-900">
                        </div>
                    </div>
                    @error('starting_time')
                        <p class="text-red-500 text-sm my-3">{{ $message }}</p>
                    @enderror
                    @error('closing_time')
                        <p class="text-red-500 text-sm my-3">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <button class="py-2.5 px-12 rounded-md text-white bg-gray-900 font-semibold">Start</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/apexcharts.js') }}"></script>
{{ $chart->script() }}
{{ $chart2->script() }}
@section('script')
<script>
    function toggleForm(){
        document.getElementById('new-election').classList.toggle('hidden');
    }

</script>
@endsection
@endsection

