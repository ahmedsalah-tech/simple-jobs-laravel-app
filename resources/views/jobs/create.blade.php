<x-layout>
    <form action="{{ route('jobs.store') }}" method="POST"> {{-- since it's named route --}}
        @csrf
        <h2>Create a New Ninja</h2>

        <!-- Job Name -->
        <label for="name">Job Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
            class="block w-full bg-white text-black border border-gray-300 rounded px-3 py-2 mt-1"
        >

        <!-- Job Strength -->
        <label for="skill">Job Skill (0-100):</label>
        <input
            type="number"
            id="skill"
            name="skill"
            required
            value="{{ old('skill') }}"
            class="block w-full bg-white text-black border border-gray-300 rounded px-3 py-2 mt-1"
        >

        <!-- Job Bio -->
        <label for="bio">Biography:</label>
        <textarea
            rows="5"
            id="bio"
            name="bio"
            required
            class="block w-full bg-white text-black border border-gray-300 rounded px-3 py-2 mt-1"
        >{{ old('bio') }}</textarea>

        <!-- select a dojo -->
        <label for="dojo_id">Dojo:</label>
        <select id="dojo_id" name="dojo_id" required class="block w-full bg-white text-black border border-gray-300 rounded px-3 py-2 mt-1">
            <option value="" disabled selected>Select a dojo</option>
            @foreach ($dojos as $dojo)
                {{--
                    We set the option value to the Dojo's ID ($dojo->id) because
                    the backend database relationship requires the foreign key (int)
                    to associate the created job with a specific Dojo, rather than
                    the Dojo's name or object.
                --}}
                <option value="{{ $dojo->id }}" {{ $dojo->id == old('dojo_id' ? 'selected' : '') }}>
                    {{ $dojo->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn mt-4">Create Job</button>

        <!-- validation errors -->
        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </form>
</x-layout>
