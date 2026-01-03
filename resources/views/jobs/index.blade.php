<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Jobs Network | Home</title>
</head>
<body>
    <h2>Currently Available Jobs</h2>

    @if ($greeting == "hello")
        <p>Hi from if Statement</p>
    @endif

    <ul>
        @foreach($jobs as $job)
            <li>
                <p>{{ $job['name'] }}</p>
                <a href="/jobs/{{ $job['id'] }}">View Details</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
