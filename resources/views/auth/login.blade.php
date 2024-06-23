<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 ">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" {{--Added styling for  the input border ring to be red--}}
                            type="password"
                            name="password"
                            required autocomplete="current-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Show Password Checkbox -->
        <div class="mt-4 ">
            <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500">
            <label for="show-password" class="text-sm text-gray-600">{{ __('Show Password') }}</label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-danger-button class="ms-3">
                {{ __('Log in') }}
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
