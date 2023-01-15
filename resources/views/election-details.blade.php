@extends('layouts.app')
@section('content')
<div class="mt-5 px-8">
    <div class="flex items-center justify-between">
        <h1 class="font-bold text-2xl text-gray-900">Election Overview</h1>
        <div class="flex gap-x-3 items-center">
            <a href="/voters/list/{{ $election->id }}" class="bg-amber-500 font-semibold text-white px-12 py-3 rounded-md">Accredited Voters</a>
            <span onclick="toogleForm()" class="bg-blue-500 font-semibold text-white px-12 py-3 rounded-md">Add Candidate</span>
            <span onclick="toggleEdit()" class="py-3 font-semibold cursor-pointer hover:bg-green-600 px-8 rounded-md text-white bg-green-500">Edit Election</span>
        </div>
    </div>
    <div class="mt-12 p-6 bg-white rounded-md">
        <h1 class="font-bold text-xl text-gray-900">Registered Candidate</h1>
        <div >
           <div class="mb-6">
            <h1 class="text-xl font-bold text-grey-800">Presidency Candidate</h1>
            <div class="flex gap-x-8 flex-wrap gap-y-6 items-center">
                @foreach ($candidates as $candidate)
            @if ($candidate->position == "Presidency")
            <div class=" hover:bg-gray-200 flex gap-x-5 items-center p-3 shadow-lg rounded-md bg-white">
                <img class=" rounded-md w-36 h-36" src="{{ asset($candidate->image) }}" alt="">
                <div>
                    <h1 class="text-lg font-bold">{{ $candidate->fullname }}</h1>
                <p><b>Contesting for</b> {{ $candidate->position }}</p>
                <p><b>Faculty</b> {{ $candidate->faculty }}</p>
                <p><b>Department</b> {{ $candidate->department }}</p>
                </div>
            </div>
            @endif
        @endforeach
            </div>
           </div>
           <div class="mb-6">
            <h1 class="text-xl font-bold text-grey-800">Vice Presidency(Ojo) Candidate</h1>
            <div class="flex gap-x-8 flex-wrap gap-y-6 items-center">
            @foreach ($candidates as $candidate)
            @if ($candidate->position == "Vice Presidency(Ojo)")
            <div class=" hover:bg-gray-200 flex gap-x-5 items-center p-3 shadow-lg rounded-md bg-white">
                <img class=" rounded-md w-36 h-36" src="{{ asset($candidate->image) }}" alt="">
                <div>
                    <h1 class="text-lg font-bold">{{ $candidate->fullname }}</h1>
                <p><b>Contesting for</b> {{ $candidate->position }}</p>
                <p><b>Faculty</b> {{ $candidate->faculty }}</p>
                <p><b>Department</b> {{ $candidate->department }}</p>
                </div>
            </div>
            @endif
        @endforeach
            </div>
           </div>
           <div class="mb-6">
            <h1 class="text-xl font-bold text-grey-800">Vice Presidency(Epe) Candidate</h1>
            <div class="flex gap-x-8 flex-wrap gap-y-6 items-center">
            @foreach ($candidates as $candidate)
            @if ($candidate->position == "Vice Presidency(Epe)")
            <div class=" hover:bg-gray-200 flex gap-x-5 items-center p-3 shadow-lg rounded-md bg-white">
                <img class=" rounded-md w-36 h-36" src="{{ asset($candidate->image) }}" alt="">
                <div>
                    <h1 class="text-lg font-bold">{{ $candidate->fullname }}</h1>
                <p><b>Contesting for</b> {{ $candidate->position }}</p>
                <p><b>Faculty</b> {{ $candidate->faculty }}</p>
                <p><b>Department</b> {{ $candidate->department }}</p>
                </div>
            </div>
            @endif
        @endforeach
            </div>
           </div>
           <div class="mb-6">
            <h1 class="text-xl font-bold text-grey-800">Vice Presidency(Ikeja) Candidate</h1>
            <div class="flex gap-x-8 flex-wrap gap-y-6 items-center">
            @foreach ($candidates as $candidate)
            @if ($candidate->position == "Vice Presidency(Ikeja)")
            <div class=" hover:bg-gray-200 flex gap-x-5 items-center p-3 shadow-lg rounded-md bg-white">
                <img class=" rounded-md w-36 h-36" src="{{ asset($candidate->image) }}" alt="">
                <div>
                    <h1 class="text-lg font-bold">{{ $candidate->fullname }}</h1>
                <p><b>Contesting for</b> {{ $candidate->position }}</p>
                <p><b>Faculty</b> {{ $candidate->faculty }}</p>
                <p><b>Department</b> {{ $candidate->department }}</p>
                </div>
            </div>
            @endif
        @endforeach
            </div>
           </div>
           <div class="mb-6">
            <h1 class="text-xl font-bold text-grey-800">Tresurer Candidate</h1>
            <div class="flex gap-x-8 flex-wrap gap-y-6 items-center">
            @foreach ($candidates as $candidate)
            @if ($candidate->position == "Tresurer")
            <div class=" hover:bg-gray-200 flex gap-x-5 items-center p-3 shadow-lg rounded-md bg-white">
                <img class=" rounded-md w-36 h-36" src="{{ asset($candidate->image) }}" alt="">
                <div>
                    <h1 class="text-lg font-bold">{{ $candidate->fullname }}</h1>
                <p><b>Contesting for</b> {{ $candidate->position }}</p>
                <p><b>Faculty</b> {{ $candidate->faculty }}</p>
                <p><b>Department</b> {{ $candidate->department }}</p>
                </div>
            </div>
            @endif
        @endforeach
            </div>
           </div>
           <div class="mb-6">
            <h1 class="text-xl font-bold text-grey-800">Gen. Secretary Candidate</h1>
            <div class="flex gap-x-8 flex-wrap gap-y-6 items-center">
            @foreach ($candidates as $candidate)
            @if ($candidate->position == "Gen. Secretary")
            <div class=" hover:bg-gray-200 flex gap-x-5 items-center p-3 shadow-lg rounded-md bg-white">
                <img class=" rounded-md w-36 h-36" src="{{ asset($candidate->image) }}" alt="">
                <div>
                    <h1 class="text-lg font-bold">{{ $candidate->fullname }}</h1>
                <p><b>Contesting for</b> {{ $candidate->position }}</p>
                <p><b>Faculty</b> {{ $candidate->faculty }}</p>
                <p><b>Department</b> {{ $candidate->department }}</p>
                </div>
            </div>
            @endif
        @endforeach
            </div>
           </div>
           <div class="mb-6">
            <h1 class="text-xl font-bold text-grey-800">Ass. Gen. Secretary Candidate</h1>
            <div class="flex gap-x-8 flex-wrap gap-y-6 items-center">
            @foreach ($candidates as $candidate)
            @if ($candidate->position == "Ass. Gen. Secretary")
            <div class=" hover:bg-gray-200 flex gap-x-5 items-center p-3 shadow-lg rounded-md bg-white">
                <img class=" rounded-md w-36 h-36" src="{{ asset($candidate->image) }}" alt="">
                <div>
                    <h1 class="text-lg font-bold">{{ $candidate->fullname }}</h1>
                <p><b>Contesting for</b> {{ $candidate->position }}</p>
                <p><b>Faculty</b> {{ $candidate->faculty }}</p>
                <p><b>Department</b> {{ $candidate->department }}</p>
                </div>
            </div>
            @endif
        @endforeach
            </div>
           </div>
           <div class="mb-6">
            <h1 class="text-xl font-bold text-grey-800">Welfare Director Candidate</h1>
            <div class="flex gap-x-8 flex-wrap gap-y-6 items-center">
            @foreach ($candidates as $candidate)
            @if ($candidate->position == "Welfare Director")
            <div class=" hover:bg-gray-200 flex gap-x-5 items-center p-3 shadow-lg rounded-md bg-white">
                <img class=" rounded-md w-36 h-36" src="{{ asset($candidate->image) }}" alt="">
                <div>
                    <h1 class="text-lg font-bold">{{ $candidate->fullname }}</h1>
                <p><b>Contesting for</b> {{ $candidate->position }}</p>
                <p><b>Faculty</b> {{ $candidate->faculty }}</p>
                <p><b>Department</b> {{ $candidate->department }}</p>
                </div>
            </div>
            @endif
        @endforeach
            </div>
           </div>
           <div class="mb-6">
            <h1 class="text-xl font-bold text-grey-800">Social Director Candidate</h1>
            <div class="flex gap-x-8 flex-wrap gap-y-6 items-center">
            @foreach ($candidates as $candidate)
            @if ($candidate->position == "Social Director")
            <div class=" hover:bg-gray-200 flex gap-x-5 items-center p-3 shadow-lg rounded-md bg-white">
                <img class=" rounded-md w-36 h-36" src="{{ asset($candidate->image) }}" alt="">
                <div>
                    <h1 class="text-lg font-bold">{{ $candidate->fullname }}</h1>
                <p><b>Contesting for</b> {{ $candidate->position }}</p>
                <p><b>Faculty</b> {{ $candidate->faculty }}</p>
                <p><b>Department</b> {{ $candidate->department }}</p>
                </div>
            </div>
            @endif
        @endforeach
            </div>
           </div>
        </div>
    </div>

    <div id="edit-election" class="absolute top-0 hidden left-0 bg-gray-800 bg-opacity-70 w-screen h-screen">
        <div class="w-80 md:w-5/12 mt-20 bg-white mx-auto rounded-md p-6">
            <div class="flex justify-end mb-4">
                <span onclick="toggleEdit()" id="close-election" class="fa fa-window-close text-2xl"></span>
            </div>
            <h1 class="text-2xl font-bold mb-2">Initiate new election</h1>
            <hr class="mb-4">
            <form action="{{ route('election') }}" method="post">
                @csrf
                <label for="" class="block mb-2 font-semibold">Election Date</label>
                <input type="date" value="{{ $election->election_date }}"  name="election_date" id="" class="block w-full p-3 border-l-4 border-gray-900">
                @error('election_date')
                    <p class="text-red-500 text-sm my-3">{{ $message }}</p>
                @enderror
                <div class="md:grid md:grid-cols-2 gap-x-2">
                    <div class="mt-3">
                        <label for="" class="block mb-2 font-semibold">Start Time</label>
                        <input type="time" name="starting_time" value="{{ $election->starting_time }}" id="" class="block w-full p-3 border-l-4 border-gray-900">
                    </div>
                    <div class="mt-3">
                        <label for="" class="block mb-2 font-semibold">Closing Time</label>
                        <input type="time" name="closing_time" id="" value="{{ $election->closing_time }}" class="block w-full p-3 border-l-4 border-gray-900">
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

    <div id="candidate" class="absolute hidden top-0 left-0 bg-gray-600 bg-opacity-70 h-full w-full">
        <div class="w-96 h-96 p-5 overflow-y-scroll mt-20 bg-white rounded-md mx-auto">
            <div class="flex justify-end">
                <i onclick="toogleForm()" class="fa fa-window-close"></i>
            </div>
            <h1 class="font-bold text-2xl mb-6 text-gray-900">Add new candidate</h1>
            <form action="/candidate/{{ $election->id }}" enctype="multipart/form-data" method="post">
                @csrf
               <select name="position"  class="block px-3 py-4 border-2 border-gray-800 rounded-md w-full mb-2" id="">
                <option value="" disabled selected>Select Position</option>
                <option value="Presidency">Presidency</option>
                <option value="Vice Presidency(Ojo)">Vice Presidency(Ojo)</option>
                <option value="Vice Presidency(Epe)">Vice Presidency(Epe)</option>
                <option value="Vice Presidency(Ikeja)">Vice Presidency(Ikeja)</option>
                <option value="Tresurer">Tresurer</option>
                <option value="Gen. Secretary">Gen. Secretary</option>
                <option value="Ass. Gen. Secretary">Ass. Gen. Secretary</option>
                <option value="Welfare Director">Welfare Director</option>
                <option value="Social Director">Social Director</option>
               </select>
            @error('position')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
                <input type="text" name="fullname" id="" value="{{ old('fullname') }}" class="block px-3 py-4 border-2 border-gray-800 rounded-md w-full mb-2" placeholder="Fullname">
            @error('fullname')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
                <input type="text" name="faculty" id="" value="{{ old('faculty') }}" class="block px-3 py-4 border-2 border-gray-800 rounded-md w-full mb-2" placeholder="Faculty">
            @error('faculty')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
                <input type="text" name="department" id="" value="{{ old('department') }}" class="block px-3 py-4 border-2 border-gray-800 rounded-md w-full mb-2" placeholder="Department">
            @error('department')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
                <input type="file" name="image" id="" class="block px-3 py-4 border-2 border-gray-800 rounded-md w-full mb-2">
            @error('image')
                <p class="text-red-500 my-2">{{ $message }}</p>
            @enderror
            <input type="submit" value="Submit" class="px-8 py-2.5 bg-gray-800 text-white rounded-md">
            </form>
        </div>
    </div>
    <script>
        function toogleForm(){
            document.getElementById("candidate").classList.toggle("hidden");
        }
        function toggleEdit(){
            document.getElementById("edit-election").classList.toggle("hidden");
        }
        </script>
@endsection

