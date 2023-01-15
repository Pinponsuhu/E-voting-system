@extends('layouts.official-layout')
@section('official-content')
@php
    $other_info = App\Models\Official::where('user_id',auth()->user()->id)->first();
    // dd($other_info);
@endphp
    <div class=" rounded-md mt-5 bg-white p-8">
        <form action="/voting/{{ $matric_number }}/{{ $pin }}" id="myForm" method="POST" class="mt-12">
            @csrf
            <div class="presidency">
            <h1 class="text-2xl font-bold text-gray-800">Presidency</h1>
            <div class="w-full flex flex-wrap gap-x-8 gap-y-5">
               @foreach ($presidency as $president)
               <div class="w-80 p-6 radio-p{{ $president->id }} rounded-md shadow-md">
                <label id="shaba" for="radio-p{{ $president->id }}">
                    <div class="w-60 flex gap-x-4 items-center">
                        <img src="{{ asset($president->image) }}" alt="" class="w-20 h-20 block">
                        <div>
                            <h1>{{ $president->fullname }}</h1>
                            <p>{{ $president->faculty }}</p>
                        </div>
                    </div>
                </label>
                <input type="radio" id="radio-p{{ $president->id }}" name="{{ $president->position }}" value="{{ $president->id }}" id="">
               </div>
               @endforeach

            </div>
            </div>
            @if($other_info->campus == 'Ojo')
            <div class="ojo mt-6">
            <h1 class="text-2xl font-bold text-gray-800">Vice Presidency(Ojo)</h1>
            <div class="w-full flex flex-wrap gap-x-8 gap-y-5">
               @foreach ($ojos as $ojo)
               <div class="w-80 p-6 radio-ojo{{ $ojo->id }} rounded-md shadow-md">
                <label id="shaba" for="radio-ojo{{ $ojo->id }}">
                    <div class="w-60 flex gap-x-4 items-center">
                        <img src="{{ asset($ojo->image) }}" alt="" class="w-20 h-20 block">
                        <div>
                            <h1>{{ $ojo->fullname }}</h1>
                            <p>{{ $ojo->faculty }}</p>
                        </div>
                    </div>
                </label>
                <input type="radio" id="radio-ojo{{ $ojo->id }}" name="ojo" value="{{ $ojo->id }}" id="">
               </div>
               @endforeach

            </div>
            @if (Session('ojo'))
            <p class="text-red-500">{{ Session('ojo') }}</p>

            @endif
        </div>


        @endif
        @if($other_info->campus == 'Epe')
            <div class="epe mt-6">
            <h1 class="text-2xl font-bold text-gray-800">Vice Presidency(Epe)</h1>
            <div class="w-full flex flex-wrap gap-x-8 gap-y-5">
                @foreach ($epes as $epe)
               <div class="w-80 p-6 radio-epe{{ $epe->id }} rounded-md shadow-md">
                <label id="shaba" for="radio-epe{{ $epe->id }}">
                    <div class="w-60 flex gap-x-4 items-center">
                        <img src="{{ asset($epe->image) }}" alt="" class="w-20 h-20 block">
                        <div>
                            <h1>{{ $epe->fullname }}</h1>
                            <p>{{ $epe->faculty }}</p>
                        </div>
                    </div>
                </label>
                <input type="radio" id="radio-epe{{ $epe->id }}" name="epe" value="{{ $epe->id }}" id="">
               </div>
               @endforeach
            </div>
            @if (Session('epe'))
            <p class="text-red-500">{{ Session('epe') }}</p>

            @endif
        </div>
        @endif
        @if($other_info->campus == 'Ikeja')
            <div class="ikeja mt-6">
            <h1 class="text-2xl font-bold text-gray-800">Vice Presidency(ikeja)</h1>
            <div class="w-full flex flex-wrap gap-x-8 gap-y-5">
                @foreach ($ikejas as $ikeja)
               <div class="w-80 p-6 radio-ikj{{ $ikeja->id }} rounded-md shadow-md">
                <label id="shaba" for="radio-ikj{{ $ikeja->id }}">
                    <div class="w-60 flex gap-x-4 items-center">
                        <img src="{{ asset($ikeja->image) }}" alt="" class="w-20 h-20 block">
                        <div>
                            <h1>{{ $ikeja->fullname }}</h1>
                            <p>{{ $ikeja->faculty }}</p>
                        </div>
                    </div>
                </label>
                <input type="radio" id="radio-ikj{{ $ikeja->id }}" name="ikeja" value="{{ $ikeja->id }}" id="">
               </div>
               @endforeach
            </div>
            @if (Session('ikeja'))
            <p class="text-red-500">{{ Session('ikeja') }}</p>

            @endif
        </div>
        @endif
            <div class="tresurer mt-6">
            <h1 class="text-2xl font-bold text-gray-800">Tresurer</h1>
            <div class="w-full flex flex-wrap gap-x-8 gap-y-5">
                @foreach ($tresurers as $tresurer)
               <div class="w-80 p-6 radio-tr{{ $tresurer->id }} rounded-md shadow-md">
                <label id="shaba" for="radio-tr{{ $tresurer->id }}">
                    <div class="w-60 flex gap-x-4 items-center">
                        <img src="{{ asset($tresurer->image) }}" alt="" class="w-20 h-20 block">
                        <div>
                            <h1>{{ $tresurer->fullname }}</h1>
                            <p>{{ $tresurer->faculty }}</p>
                        </div>
                    </div>
                </label>
                <input type="radio" id="radio-tr{{ $tresurer->id }}" name="{{ $tresurer->position }}" value="{{ $tresurer->id }}" id="">
               </div>
               @endforeach
            </div>
            </div>
            <div class="gen_sec mt-6">
            <h1 class="text-2xl font-bold text-gray-800">Gen. Secretary</h1>
            <div class="w-full flex flex-wrap gap-x-8 gap-y-5">
                @foreach ($gen_secs as $gen_sec)
               <div class="w-80 p-6 radio-gs{{ $gen_sec->id }} rounded-md shadow-md">
                <label id="shaba" for="radio-gs{{ $gen_sec->id }}">
                    <div class="w-60 flex gap-x-4 items-center">
                        <img src="{{ asset($gen_sec->image) }}" alt="" class="w-20 h-20 block">
                        <div>
                            <h1>{{ $gen_sec->fullname }}</h1>
                            <p>{{ $gen_sec->faculty }}</p>
                        </div>
                    </div>
                </label>
                <input type="radio" id="radio-gs{{ $gen_sec->id }}" name="{{ $gen_sec->position }}" value="{{ $gen_sec->id }}" id="">
               </div>
               @endforeach


            </div>
            </div>
            <div class="ass_sec mt-6">
            <h1 class="text-2xl font-bold text-gray-800">Ass. Gen. Secretary</h1>
            <div class="w-full flex flex-wrap gap-x-8 gap-y-5">
                @foreach ($ass_secs as $ass_sec)
               <div class="w-80 p-6 radio-as{{ $ass_sec->id }} rounded-md shadow-md">
                <label id="shaba" for="radio-as{{ $ass_sec->id }}">
                    <div class="w-60 flex gap-x-4 items-center">
                        <img src="{{ asset($ass_sec->image) }}" alt="" class="w-20 h-20 block">
                        <div>
                            <h1>{{ $ass_sec->fullname }}</h1>
                            <p>{{ $ass_sec->faculty }}</p>
                        </div>
                    </div>
                </label>
                <input type="radio" id="radio-as{{ $ass_sec->id }}" name="{{ $ass_sec->position }}" value="{{ $ass_sec->id }}" id="">
               </div>
               @endforeach


            </div>
            </div>
            <div class="welfare mt-6">
            <h1 class="text-2xl font-bold text-gray-800">Welfare Director</h1>
            <div class="w-full flex flex-wrap gap-x-8 gap-y-5">
                @foreach ($welfares as $welfare)
               <div class="w-80 p-6 radio-w{{ $welfare->id }} rounded-md shadow-md">
                <label id="shaba" for="radio-w{{ $welfare->id }}">
                    <div class="w-60 flex gap-x-4 items-center">
                        <img src="{{ asset($welfare->image) }}" alt="" class="w-20 h-20 block">
                        <div>
                            <h1>{{ $welfare->fullname }}</h1>
                            <p>{{ $welfare->faculty }}</p>
                        </div>
                    </div>
                </label>
                <input type="radio" id="radio-w{{ $welfare->id }}" name="{{ $welfare->position }}" value="{{ $welfare->id }}" id="">
               </div>
               @endforeach


            </div>
            </div>
            <div class="social mt-6">
            <h1 class="text-2xl font-bold text-gray-800">Social Director</h1>
            <div class="w-full flex flex-wrap gap-x-8 gap-y-5">
                @foreach ($socials as $social)
               <div class="w-80 p-6 radio-s{{ $social->id }} rounded-md shadow-md">
                <label id="shaba" for="radio-s{{ $social->id }}">
                    <div class="w-60 flex gap-x-4 items-center">
                        <img src="{{ asset($social->image) }}" alt="" class="w-20 h-20 block">
                        <div>
                            <h1>{{ $social->fullname }}</h1>
                            <p>{{ $social->faculty }}</p>
                        </div>
                    </div>
                </label>
                <input type="radio" id="radio-s{{ $social->id }}" name="{{ $social->position }}" value="{{ $social->id }}" id="">
               </div>
               @endforeach
            </div>
            </div>

            <div class="mt-5 flex justify-end">
                <button type="submit" class="px-8 py-2.5 bg-gray-800 rounded-md text-white">Submit</button>
            </div>

        </form>
    </div>
    <div class="flex justify-center mt-5 items-center gap-x-6">
        <span class="py-3 px-8 bg-red-500 text-white font-bold rounded-md block">Prev</span>
        <span class="py-3 px-8 bg-green-500 text-white font-bold rounded-md block">Next</span>
    </div>
    <script>
    var rad =  document.querySelectorAll('input[name="presidency"]');
var prev = null;
for (var i = 0; i < rad.length; i++) {
    rad[i].addEventListener('change', function() {
        (prev) ? prev.id;
        if (this !== prev) {
            prev = this;
            // console.log(prev.id);
            let id ='.' + prev.id;
            console.log(id);
            let label =  document.querySelector(id)
            console.log(label)
            label.classList.add('bg-green-500');
        }
        // console.log("hiiiii");
        // console.log(this.value)
    });
}
    </script>
@endsection
