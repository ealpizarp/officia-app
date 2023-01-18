<nav class="flex flex-row justify-between items-center bg-highlight_blue h-16 w-full dark:bg-gray-600">
    {{-- <a href="/"><img class="w-24 p-3" src={{ asset('images/app-logo.png') }} alt=""
            class="logo" /></a> --}}
    <a class="flex flex-row items-center font-medium text-2xl font-sans text-gray-700 md:hidden dark:text-gray-300" href="/"><img class="w-16 mt-2 md:hidden dark:text-gray-500" src={{ asset('images/officia-logo-color.svg') }} alt="Oficia Logo"
            class="logo" />Officia</a>
    <button type="button" onclick="toggleNavbar()"
        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 dark:text-gray-200 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
        </svg>
    </button>


    <div class="hidden relative align-start items-center lg:flex">
        <div>

            @auth
                @if (\Auth::user()->isAdmin())
                    <a href="/dashboard"><img class="w-16 p-1 mt-1" src={{ asset('images/officia-logo-color.svg') }}
                            alt="Oficia Logo" class="logo" /></a>
                @elseif (\Auth::user()->isUser())
                    <a href="/user"><img class="w-16 p-1 mt-1" src={{ asset('images/officia-logo-color.svg') }}
                            alt="Oficia Logo" class="logo" /></a>
                @endif
            @else
                <a href="/"><img class="w-16 p-1 mt-1" src={{ asset('images/officia-logo-color.svg') }} alt="Oficia Logo"
                        class="logo" /></a>
            @endauth

        </div>


        <ul class="flex space-x-6 text-md ml-3">
            <li>
                <a href="/locations"
                    class="text-sm text-zinc-600 hover:text-cyan-600 dark:text-gray-200 transition duration-300"><i
                        class="p-1 fa-solid fa-map-pin fa-envelope"></i> Location</a>
            </li>
            @auth
                @if (Auth::user()->isAdmin())
                    <li>
                        <a href="/showusers/admin"
                            class="text-sm text-zinc-600 hover:text-cyan-600 dark:text-gray-200 transition duration-300"><i
                                class="p-1 fa-solid fa-user"></i> Buisness Owners</a>
                    </li>
                    <li>
                        <a href="/reports"
                            class="text-sm text-zinc-600 hover:text-cyan-600 dark:text-gray-200 transition duration-300"><i
                                class="p-1 fa-solid fa-flag"></i> Reports</a>
                    </li>
                @elseif (Auth::user()->isUser())
                    <li>
                        <a href="/showusers/user"
                            class="text-sm text-zinc-600 hover:text-cyan-600 dark:text-gray-200 transition duration-300"><i
                                class="p-1 fa-solid fa-user"></i> Buisness Owners</a>
                    </li>
                @endif
            @else
                <li>
                    <a href="/showusers/guest"
                        class="text-sm text-zinc-600 hover:text-cyan-600  dark:text-gray-200 transition duration-300"><i
                            class="p-1 fa-solid fa-user"></i> Buisness Owners</a>
                </li>
            @endauth

            <li>
                <a href="/categories"
                    class="text-sm text-zinc-600 hover:text-cyan-600  dark:text-gray-200 transition duration-300"><i
                        class="p-1 fa-solid fa-border-all"></i> Categories</a>
            </li>
        </ul>
    </div>
    @auth

        <div class="hidden relative right-2 md:flex">
            <ul class="flex space-x-6 text-md">
                <li>
                    <a href="/users/{{ Auth::user()->id }}">
                        <span
                            class="font-bold uppercase text-zinc-600 text-sm hover:text-cyan-600 dark:text-gray-200 transition duration-300">
                            Welcome {{ auth()->user()->name }}
                        </span>
                    </a>
                </li>

                @auth
                    @if (\Auth::user()->isAdmin())
                        <li>
                            <a href="/listings/admin/create"
                                class="text-zinc-600 text-sm hover:text-cyan-600 transition dark:text-gray-200 duration-300"><i
                                    class="fa-solid fa-plus"></i></i> Post a service</a>
                        </li>
                    @elseif (\Auth::user()->isUser())
                        <li>
                            <a href="/listings/user/create"
                                class="text-zinc-600 text-sm hover:text-cyan-600 transition dark:text-gray-200 duration-300"><i
                                    class="fa-solid fa-plus"></i></i> Post a service</a>
                        </li>
                    @endif

                @endauth

                <li>
                    <form action="/logout"
                        class="inline text-zinc-600 hover:text-cyan-600 dark:text-gray-200 transition duration-300"
                        method="POST">
                        @csrf
                        <button class="hover:text-cyan-600 transition text-sm duration-300 dark:text-gray-200"
                            type="submit">
                            <i class="fa-solid fa-door-closed "></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @else
        <div class="hidden md:flex relative space-x-6 right-10">
            <ul class="flex space-x-6 text-md">
                <li>
                    <a href="/register"
                        class="text-sm text-zinc-600 hover:text-cyan-600 dark:text-gray-200 transition duration-300"><i
                            class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login"
                        class="text-sm text-zinc-600 hover:text-cyan-600 dark:text-gray-200 transition duration-300"><i
                            class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            </ul>
        </div>


    @endauth
</nav>


<div class="hidden w-full md:w-auto lg:hidden" id="navbar-default">
    <ul
        class="flex flex-col p-4 mt-0 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <a href="/"
            class="block py-2 pl-3 pr-4 text-white bg-cyan-700 rounded md:bg-transparent md:text-cyan-700 md:p-0 dark:text-white"
            aria-current="page">Home</a>
        </li>
        <li>
            <a href="/locations"
                class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Locations</a>
        </li>
        <li>
            <a href="/categories"
                class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Categories</a>
        </li>
        @auth
            @if (Auth::user()->isAdmin())
                <li>
                    <a href="/showusers/admin"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Buisness
                        Owners</a>
                </li>

                <li>
                    <a href="/reports"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Reports</a>
                </li>

                <li>
                    <a href="/listings/admin/create"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Post
                        a service</a>
                </li>
            @elseif (Auth::user()->isUser())
                <li>
                    <a href="/showusers/user"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Buisness
                        Owners</a>
                </li>
                <li>
                    <a href="/listings/user/create"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Post
                        a service</a>
                </li>
            @endif
        @else
            <li>
                <a href="/showusers/guest"
                    class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Buisness
                    Owners</a>
            </li>
            <li>
                <a href="/register"
                    class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Register</a>
            </li>
            <li>
                <a href="/login"
                    class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-cyan-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
            </li>
        @endauth


    </ul>
</div>


<script>
    function toggleNavbar() {
        var x = document.getElementById("navbar-default");
        if (x.classList.contains("block")) {
            x.classList.remove("block");
            x.classList.add("hidden");
        } else {
            x.classList.remove("hidden");
            x.classList.add("block");
        }
    }
</script>
