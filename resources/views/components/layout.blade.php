<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs Network</title>
    @vite('resources/css/app.css')

</head>
<body>

    <header>
        <nav>
            <h1>Jobs Network</h1>
            {{-- Built-in Helper function --}}
            <a href="{{ route('jobs.index') }}">All Jobs</a>
            <a href="{{ route('jobs.create') }}">Create New Jobs</a>
        </nav>
    </header>

    <main class="container">
        {{ $slot }} {{-- wrappes the content inside --}}
    </main>

</body>
</html>
