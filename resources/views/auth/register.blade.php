<x-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <h2>Register for an Account</h2>

        <label for="name">Name:</label>
        <input
            type="text"
            name="name"
            required
            value="{{ old('name') }}"
            class="block w-full bg-white text-black border border-gray-300 rounded px-3 py-2 mt-1"
        >

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

        <label for="password_confirmation">Confirm Password:</label>
        <input
            type="password"
            name="password_confirmation"
            required
            class="block w-full bg-white text-black border border-gray-300 rounded px-3 py-2 mt-1"
        >

        <button type="submit" class="btn mt-4">Register</button>

        <!-- validation errors -->

</form>
</x-layout>
