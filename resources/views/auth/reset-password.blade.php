<x-guest-layout>
<<<<<<< HEAD
    <div style="text-align: center; margin-bottom: 2rem;">
        <h2 style="font-size:1.5rem;font-weight:700;color:#f1f5f9;margin:0 0 0.5rem;">Reset Your Password</h2>
        <p style="color:#94a3b8;font-size:0.9rem;margin:0;">Please enter your new password to regain access.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

=======
>>>>>>> origin/online_library
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
<<<<<<< HEAD
        <div class="form-group">
            <label class="form-label" for="email">{{ __('Email Address') }}</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
=======
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
>>>>>>> origin/online_library
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
<<<<<<< HEAD
        <div class="form-group">
            <label class="form-label" for="password">{{ __('New Password') }}</label>
            <div style="position:relative;">
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" style="padding-right:2.75rem;" />
                <button type="button" onclick="togglePassword('password','eye-reset-pass')" tabindex="-1"
                    style="position:absolute;right:0.75rem;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#64748b;padding:0;display:flex;align-items:center;">
                    <svg id="eye-reset-pass" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
=======
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
>>>>>>> origin/online_library
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
<<<<<<< HEAD
        <div class="form-group">
            <label class="form-label" for="password_confirmation">{{ __('Confirm New Password') }}</label>
            <div style="position:relative;">
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" style="padding-right:2.75rem;" />
                <button type="button" onclick="togglePassword('password_confirmation','eye-reset-conf')" tabindex="-1"
                    style="position:absolute;right:0.75rem;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#64748b;padding:0;display:flex;align-items:center;">
                    <svg id="eye-reset-conf" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</x-guest-layout>

<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        const isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';
        icon.innerHTML = isHidden ?
            `<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>` :
            `<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
    }
</script>
=======
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
>>>>>>> origin/online_library
