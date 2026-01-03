<x-layout>
    <h2>Currently Available Jobs</h2>

    <ul>
        @foreach($jobs as $job)
            <li>
                <p>{{ $job['name'] }}</p>
                <a href="/jobs/{{ $job['id'] }}">View Details</a>
            </li>
        @endforeach
    </ul>
</x-layout>
