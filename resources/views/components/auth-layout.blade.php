<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <div class="h-screen w-screen flex items-center justify-center">
        <div class="w-2/3 py-28 flex flex-col items-center justify-center bg-gray-400 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-50 border border-gray-100">
            <div class=" w-2/5 px-28 py-16 bg-white">

                <div class="w-full pb-6">
                    {{ $text }}
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                {{$slot}}
            </div>
        </div>
    </div>
</x-guest-layout>
