<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <img src="{{ asset('front/img/cool.png') }}" alt="">
        </div>

        <div>
            <h3>Welcome to Cool</h3>
            <p>You can simple use your cool to Sign in</p>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-error :messages="$errors->get('email')"  />
            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required autofocus autocomplete="username" placeholder="Nomer HP" />
        </div>

        <!-- Password -->
        <div class="password-container">

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder=" Password" />
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                                <i class="fas fa-eye"></i>
                            </span>

            <x-input-error :messages="$errors->get('password')" class="" />
        </div>

        <div class="forget">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 btn">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
