<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Sign Out</button>
</form>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex justify-between items-center">
                <span class="text-gray-900">
                    {{ __("You're logged in!") }}
                </span>
                <a href="movies" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                    {{ __("Admin") }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
