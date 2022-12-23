<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Koulen&family=Poppins&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                        highlight_blue: "#E2ECF4"
                    },
                },
            },
        };
    </script>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    <title>Officia Dashboard</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center bg-highlight_blue h-16 w-full">
        {{-- <a href="/"><img class="w-24 p-3" src={{ asset('images/app-logo.png') }} alt=""
                class="logo" /></a> --}}
            


            
            <div class="flex relative align-start left-3 items-center">
                <div>
                    <a href="/dashboard"><img class="w-16 p-3" src={{ asset('images/logo-no-background.svg') }} alt="Oficia Logo"
                        class="logo" /></a>
                </div>
                <ul class="flex space-x-6 text-md ml-3">

                    <li> 
                        <a href="/" class="text-zinc-600 hover:text-cyan-600 transition duration-300"><i class="fa-solid fa-map-pin fa-envelope"></i> Locations</a>
                    </li>
                    <li> 
                        <a href="/" class="text-zinc-600 hover:text-cyan-600 transition duration-300"><i class="fa-solid fa-id-badge"></i> Buisness Owners</a>
                    </li>
                    <li> 
                        <a href="/" class="text-zinc-600 hover:text-cyan-600 transition duration-300"><i class="fa-solid fa-border-all"></i> Categories</a>
                    </li>
                </ul>
            </div>
            @auth

            <div class="flex relative space-x-6 right-20">
                <ul class="flex space-x-6 text-md">
                    <li>
                        <span class="font-bold uppercase text-zinc-600 hover:text-cyan-600 transition duration-300">
                            Welcome {{auth()->user()->name}}
                        </span>
                    </li>
                    <li>
                        <a href="/listings/create" class="text-zinc-600 hover:text-cyan-600 transition duration-300"><i class="fa-solid fa-plus"></i></i> Post a service</a>
                    </li>
                    <li>
                        <form action="/logout" class="inline text-zinc-600 hover:text-cyan-600 transition duration-300" method="POST">
                        @csrf
                        <button class="hover:text-cyan-600 transition duration-300" type="submit">
                            <i class="fa-solid fa-door-closed "></i> Logout
                        </button>
                        </form>
                    </li>
                </ul>
            </div>
            @else

            <div class="flex relative space-x-6 right-20">
                <ul class="flex space-x-6 text-md">
                    <li>
                        <a href="/register" class="text-zinc-600 hover:text-cyan-600 transition duration-300"><i class="fa-solid fa-user-plus"></i> Register</a>
                    </li>
                    <li>
                        <a href="/login" class="text-zinc-600 hover:text-cyan-600 transition duration-300"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a>
                    </li>
                </ul>
            </div>


            @endauth
    </nav>


    <main>
        @yield('content')
        
    </main>


    {{-- <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-cyan-700 text-white h-20 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a href="/listings/create" class="absolute rounded-md top-1/3 right-10 bg-black text-white py-2 px-5">Post property</a>
    </footer> --}}

</body>

</html>
