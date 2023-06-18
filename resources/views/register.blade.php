<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <div class="h-screen w-screen flex items-center justify-center">
        <div class="w-2/3 py-28 flex flex-col items-center justify-center bg-gray-400 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-50 border border-gray-100">
            <!-- Validation Errors -->
            <div class=" w-2/5 px-28 py-16 bg-white">

                <div class="w-full pb-6">
                    <h1>
                        Plongez dans l'univers des amoureux canins : des conseils, des histoires et des astuces pour choyer votre fidèle compagnon sur notre blog exclusif !
                    </h1>
                    <h3 class="block pt-4 font-3xl">
                        creer un compte <span class="font-bold text-primary">maintenant</span>
                    </h3>
                </div>
                <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="w-full flex flex-col items-center justify-center" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="w-full">
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="w-full mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="w-full mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="w-full mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    </div>
</x-guest-layout>
