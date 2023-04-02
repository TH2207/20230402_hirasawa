<x-guest-layout>
    <x-auth-card>
        <!-- <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot> -->
        <x-slot name="title">Register</x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="flex items-center">
                <!-- <x-label for="name" :value="__('Name')" class="w-20" /> -->
                <i class="fa-solid fa-user fa-2x w-16" for="name"></i>
                <x-input id="name" class="block w-full border-text" type="text" name="name" :value="old('name')" placeholder="Username" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4 flex items-center">
                <i class="fa-solid fa-envelope fa-2x w-16" for="email"></i>
                <!-- <x-label for="email" :value="__('Email')" class="w-20" /> -->
                <x-input id="email" class="block w-full border-text" type="email" name="email" :value="old('email')" placeholder="Email" required />
            </div>

            <!-- Password -->
            <div class="mt-4 flex items-center">
                <i class="fa-solid fa-unlock-keyhole fa-2x w-16" for="password"></i>
                <!-- <x-label for="password" :value="__('Password')" class="w-20" /> -->
                <x-input id="password" class="block w-full border-text" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <!-- <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div> -->

            <div class="flex items-center justify-end mt-4">
                <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> -->

                <x-button class="ml-4">
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>