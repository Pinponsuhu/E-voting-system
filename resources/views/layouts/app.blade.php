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

            <p id="menu-" class="mb-3 text-gray-400 text-lg px-4">Menu</p>
            <div id="menu-label" class="px-4">
                <hr class="mb-3 px-4">
            </div>
            <a href="{{ route('dashboard') }}" id="menu-link" class="flex mb-5 items-center p-4 mb-1.5 hover:bg-purple-100 rounded-md hover:text-gray-900 gap-x-4 "><i class="fa text-3xl fa-chart-pie"></i> <span id="menu-label" class="text-lg">Dashboard</span></a>

            <a href="{{ route('election') }}" id="menu-link" class="flex mb-5 items-center p-4 mb-1.5 hover:bg-purple-100 rounded-md hover:text-gray-900 gap-x-6 "><i class="fa text-3xl fa-user-tie"></i> <span id="menu-label" class="text-lg">Elections</span></a>
            <a href="{{ route('official_overview') }}" id="menu-link" class="flex items-center p-4 mb-1.5 hover:bg-purple-100 rounded-md hover:text-gray-900 gap-x-4 "><i class="fa text-3xl fa-user-cog"></i> <span id="menu-label" class="text-lg">Officials</span></a>
            <a href="{{ route('view_password') }}" id="menu-link" class="flex mb-5 items-center p-4 mb-1.5 hover:bg-purple-100 rounded-md hover:text-gray-900 gap-x-4 "><i class="fa text-3xl fa-user-shield"></i> <span id="menu-label" class="text-lg">Password</span></a>
            <a href="{{ route('logout') }}" id="menu-link" class="flex items-center p-4 mb-1.5 hover:bg-purple-100 rounded-md hover:text-gray-900 gap-x-6 "><i class="fas text-3xl fa-power-off"></i> <span id="menu-label" class="text-lg">Logout</span></a>
        </div>
    </nav>
    <main class="w-full p-3 h-full overflow-y-scroll">
        <div class="p-5 sticky bg-gray-900 flex justify-between items-center text-white rounded-md">
            <img src="{{ asset('img/menu.png') }}" id="menu" class="w-7 h-7" alt="Menu">
            <div id="admin-dropdown" class="flex cursor-pointer items-center gap-x-4">
               <img src="{{ asset('img/user.png') }}" class="w-12 h-12" alt="">
               <p class="font-semibold">{{ auth()->user()->username }}</p>
            </div>
        </div>
        @yield('content')
    </main>
    <script>
        document.getElementById('admin-dropdown').addEventListener("click",()=>{
            document.getElementById("dropdown-menu").classList.toggle("hidden");
        });
        let sideToggle = true;
        document.getElementById('menu').addEventListener("click",()=>{
            // console.log(document.querySelectorAll("#menu-label"));
            let itemLength = document.querySelectorAll("#menu-label");
            let linkLength = document.querySelectorAll("#menu-link");
            console.log(itemLength);
            itemLength.forEach(element => {
                element.classList.toggle("hidden");
                // element.classList.toggle("justify-center");
            });
            sideToggle = !sideToggle;
            if(sideToggle){
                document.getElementById("side-nav").classList.add("w-64");
                document.getElementById("side-nav").classList.remove("w-32");
                linkLength.forEach(element => {
                element.classList.remove("justify-center");
            });
            }else{
                document.getElementById("side-nav").classList.remove("w-64");
                document.getElementById("side-nav").classList.add("w-32");
                linkLength.forEach(element => {
                element.classList.add("justify-center");
                console.log("hi");
            });
            }
        });
    </script>
    @yield('script')
</body>
</html>
