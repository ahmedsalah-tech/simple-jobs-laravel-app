<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs Network</title>
    @vite('resources/css/app.css')

</head>
<body>
    @if (session('success'))
    <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
      {{ session('success') }}
    </div>
    @endif
    <header>
        <nav>
            <h1>
                <a href="{{ route('jobs.index') }}">Ninja Network</a>
            </h1>
            {{-- Built-in Helper function --}}

            @guest {{-- only sshow to the unathenticated users --}}
                <a href="{{ route('show.login') }}" class="btn">Login</a>
                <a href="{{ route('show.register') }}" class="btn">Register</a>
            @endguest

            @auth {{-- only shows elemnts when the user is authenticated --}}
                <span class="border-r-2 pr-2">
                  Hi there, {{ Auth::user()->name }} {{-- Auth facade provides support for templating directves --}}
                </span>
                <a href="{{ route('jobs.create') }}">Create New Jobs</a>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                     @csrf
                     <button class="btn">Logout</button>
                </form>
            @endauth
        </nav>
    </header>

    <main class="container">
        {{ $slot }} {{-- wrappes the content inside --}}
    </main>

</body>
</html>
