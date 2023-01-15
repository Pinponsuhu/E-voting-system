<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Voting System</title>
  <script src="{{ asset('js/all.js') }}"></script>
</head>
<body class="bg-purple-100">
    <form action="{{ route('login') }}" class="mt-12 block w-80 md:w-96 bg-white mx-auto p-6 rounded-md shadow-md" method="POST">

        <div>
            <img src="{{ asset('img/lasu.png') }}" class="w-20 h-20" alt="">
            <h1 class="text-3xl text-gray-900 font-bold mt-1">Login Page</h1>
            <hr class="my-5">
        </div>
        @csrf
        @if(Session('message'))
        <h1 class="text-xl font-bold mb-0.5 text-red-500">Oops</h1>
            <p class="text-red-500">{{ Session('message') }}</p>
        @endif
        <div class="my-3">
            <label for="" class="block font-semibold mb-3">Username</label>
            <input type="text" name="username" class="p-3 rounded-md border-2 block w-full">
            @error('username')
            <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-3">
            <label for="" class="block font-semibold mb-3">Password</label>
            <input type="password" name="password" class="p-3 rounded-md border-2 block w-full">
            @error('password')
            <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
            @enderror
        </div>
        <button class="bg-blue-500 py-3 px-8 rounded-md text-white">Login</button>
    </form>
</body>
