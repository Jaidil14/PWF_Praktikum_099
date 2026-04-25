<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label class="text-sm text-[#e2e8f0]" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full text-[#e2e8f0] bg-[#0d1020] border-[#2e3150] focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="text-sm text-[#e2e8f0]" for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full text-[#e2e8f0] bg-[#0d1020] border-[#2e3150] focus:border-indigo-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-[#2e3150] text-indigo-600 shadow-sm focus:ring-indigo-500 bg-[#0d1020]" name="remember">
                <span class="ms-2 text-sm text-[#94a3b8]">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-[#94a3b8] hover:text-[#e2e8f0] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 !text-[#0d1020] !bg-[#e2e8f0] hover:!bg-white uppercase tracking-widest">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

