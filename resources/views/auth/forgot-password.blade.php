<x-guest-layout>
<<<<<<< HEAD
    <div style="margin-bottom: 1.5rem; text-align: center; color: #94a3b8; font-size: 0.95rem; line-height: 1.6;">
=======
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
>>>>>>> origin/online_library
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
<<<<<<< HEAD
        <div class="form-group">
            <label class="form-label" for="email">{{ __('Email Address') }}</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>
=======
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
>>>>>>> origin/online_library
