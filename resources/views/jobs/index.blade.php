<x-layout>
    <h2>Currently Available Jobs</h2>

    <ul>
        @foreach($jobs as $job)
            <li>
                {{-- using named route here --}}
                <x-card href="{{ route('jobs.show', $job->id) }}" :highlight="$job['skill'] > 70 "> {{-- rendering a dynamic Prop --}}
                    <h3>{{ $job->name }}</h3>
                </x-card>
            </li>
        @endforeach
    </ul>

    {{ $jobs->links() }}
</x-layout>
