<x-layout>
    <h2>{{ $job->name }}</h2>

    <div class="bg-gray-2- p-4 rounded">
        <p><strong>Skill Level: </strong>{{ $job->skill }}</p>
        <p><strong>About Me: </strong></p>
        <p>{{ $job->bio }}</p>
    </div>
</x-layout>
