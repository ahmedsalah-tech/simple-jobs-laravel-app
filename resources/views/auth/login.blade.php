<x-layout>
    <form action="{{ route('login') }}" method="POST">
        @csrf

         <h2>Log In to Your Account</h2>

        <label for="email">Email:</label>
        <input
            type="email"
            name="email"
            required
            value="{{ old('email') }}"
            class="block w-full bg-white text-black border border-gray-300 rounded px-3 py-2 mt-1"
        >

        <label for="password">Password:</label>
        <input
            type="password"
            name="password"
            required
            class="block w-full bg-white text-black border border-gray-300 rounded px-3 py-2 mt-1"
        >

        <button type="submit" class="btn mt-4">Login</button>

        <!-- validation errors -->
         @if ($errors->any()) {{-- outputs the thrown exceptions --}}
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </form>
</x-layout>
