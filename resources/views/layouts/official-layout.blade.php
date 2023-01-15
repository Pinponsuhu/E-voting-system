<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Voting System</title>
  <script src="{{ asset('js/all.js') }}"></script>
</head>
<body class="bg-purple-100 flex h-screen">
    <nav id="side-nav" class="w-64 transition ease-in-out delay-1000 duration-1000 bg-gray-900 p-3 h-screen overflow-y-scroll">
        <div class="w-full rounded-md p-4 flex gap-x-4 items-center bg-purple-200">
            <img src="{{ asset('img/lasu.png') }}" alt="Logo" class="w-12 h-12">
            <div id="menu-label">
                <h1 class="text-2xl font-bold text-gray-900">Voting</h1>
                <h1 class="text-2xl font-bold -mt-1 text-gray-900">System</h1>
            </div>
        </div>
        <div class="mt-5 text-purple-100 font-semibold">

            <p id="menu-label" class="mb-3 text-gray-400 text-lg px-4">Reports</p>
            <div id="menu-label" class="px-4">
                <hr class="mb-3 px-4">
            </div>
            <a href="{{ route('official_dashboard') }}" id="menu-link" class="flex items-center p-4 mb-1.5 hover:bg-purple-100 rounded-md hover:text-gray-900 gap-x-4 "><i class="fa text-3xl fa-chart-pie"></i> <span id="menu-label" class="text-lg">Dashboard</span></a>
            <a href="{{ route('official_voter_list') }}" id="menu-link" class="flex items-center p-4 mb-1.5 hover:bg-purple-100 rounded-md hover:text-gray-900 gap-x-4 "><i class="fa text-3xl fa-user-add"></i> <span id="menu-label" class="text-lg">Accreditation</span></a>
            <a href="{{ route('official_voting') }}" id="menu-link" class="flex items-center p-4 mb-1.5 hover:bg-purple-100 rounded-md hover:text-gray-900 gap-x-3 "><i class="fa text-3xl fa-vote-yea"></i> <span id="menu-label" class="text-lg">Vote</span></a>


    </nav>
    <main class="w-full p-3 h-full overflow-y-scroll">
        <div class="p-5 sticky bg-gray-900 flex justify-between items-center text-white rounded-md">
            <img src="{{ asset('img/menu.png') }}" id="menu" class="w-7 h-7" alt="Menu">
            <div id="admin-dropdown" class="flex cursor-pointer items-center gap-x-4">
               <img src="{{ asset('img/user.png') }}" class="w-12 h-12" alt="">
               <p class="font-semibold">{{ auth()->user()->username }}</p>
            </div>
        </div>
        @yield('official-content')
    </main>
</body>
