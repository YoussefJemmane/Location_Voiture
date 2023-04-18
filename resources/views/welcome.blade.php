<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <nav class="flex items-center justify-between flex-wrap bg-cyan-900 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
            </svg>
            <span class="font-semibold text-xl tracking-tight">Slash Brothers</span>
        </div>
        <div class="block lg:hidden">
            <button data-collapse-toggle="navbar-default"
                class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="hidden  w-full  flex-grow lg:flex lg:items-center lg:w-auto " id="navbar-default">
            <div class="text-sm lg:flex-grow">
                <a href="{{ route('home') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Home
                </a>
                <a href="{{ route('vehicules.index') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    Cars
                </a>

                @if (Auth::check() && Auth::user()->roles === 1)

                            <a href="{{ route('reservation.index') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                                Reservation
                            </a>

                @endif
                @if (Auth::check() && Auth::user()->roles === 0)

                            <a href="{{ route('reservationuser.index',Auth::user()->id) }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                                Reservation
                            </a>

                @endif

                <a href="{{ route('contact') }}"
                    class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                    Contact Us
                </a>
            </div>
            <div>
                @auth

                @else
                    <a href="{{ route('login') }}"
                        class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Register</a>
                    @endif
                @endauth
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if (Auth::check())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                {{-- if not login show guest --}}

                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else

                @endif
            </div>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
</body>

</html>
