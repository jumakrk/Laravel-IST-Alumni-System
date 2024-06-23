<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Show Password Checkbox -->
        <div class="mt-4 ">
            <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500">
            <label for="show-password" class="text-sm text-gray-600">{{ __('Show Password') }}</label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-danger-button class="ms-4">
                {{ __('Register') }}
            </x-danger-button>
        </div>
    </form>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.querySelector("#password"); //Can use getElementById instead
            var confirmPasswordField = document.querySelector("#password_confirmation");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
            }
        }
    </script>
    
</x-guest-layout>
