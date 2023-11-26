<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div style="display:flex">
            <!-- Name -->
            <div style="width: 50%;">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div style="margin-left: 30px;width: 50%;">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <div style="display:flex" class="mt-4">
            <!-- Contact -->
            <div style="width: 50%;">
                <x-input-label for="contact" :value="__('Contact')" />
                <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required autofocus autocomplete="contact" />
                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            </div>

            <!-- Date of Birth -->
            <div style="margin-left: 30px;width: 50%;">
                <x-input-label for="dob" :value="__('Date of Birth')" />
                <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
            </div>
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />

            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" required autocomplete="new-address" />

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Address -->
        <!-- <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />

            <textarea id="address" name="address" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3" required autocomplete="new-address">{{ old('address') }}</textarea>

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div> -->

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>