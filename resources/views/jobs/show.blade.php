<x-layout>
    <h2>{{ $job->name }}</h2>

    <div class="bg-gray-2- p-4 rounded">
        <p><strong>Skill Level: </strong>{{ $job->skill }}</p>
        <p><strong>About Me: </strong></p>
        <p>{{ $job->bio }}</p>
    </div>

    {{-- Dojos info --}}
    <div class="border-2 border-dashed bg-white px-4 pb-4 my-4 rounded">
        <p><strong>Dojo's name:</strong> {{ $job->dojo->name }}</p>
        <p><strong>Location:</strong> {{ $job->dojo->location }}</p>
        <p><strong>About the Dojo's:</strong></p>
        <p>{{ $job->dojo->description }}</p>
    </div>

    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
        @csrf
        @method('DELETE') {{-- makes a hidden input with delete as the attribute's value --}}

        <button type="submit" class="btn my-4">Delete Job</button>
    </form>
</x-layout>
