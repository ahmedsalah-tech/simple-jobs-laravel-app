<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Jobs Network | Home</title>
</head>
<body>
    <h2>Currently Available Jobs</h2>

    <p>{{ $greeting }}</p>

    <ul>
        <li>
            <a href="/jobs/{{ $jobs[0]["id"] }}">
                {{ $jobs[0]["name"] }}
            </a>
        </li>
        <li>
            <a href="/jobs/{{ $jobs[1]["id"] }}">
                {{ $jobs[0]["name"] }}
            </a>
        </li>
    </ul>
</body>
</html>
