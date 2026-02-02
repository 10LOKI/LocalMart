<x-guest-layout>
    <div class="space-y-6 text-[#e8ebf0]">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#9aa3ad]">Welcome back</p>
            <h2 class="mt-3 font-['Bebas_Neue'] text-4xl tracking-wide text-white sm:text-5xl">Join the Ride</h2>
            <p class="mt-3 text-sm text-[#b3bcc7]">Return to your garage and keep the local moto community moving.</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-[#c3c9d2]" />
                <div class="relative mt-2">
                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[#8b95a1]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M4 6h16v12H4z" />
                            <path d="m4 7 8 6 8-6" />
                        </svg>
                    </span>
                    <x-text-input id="email" class="block w-full rounded-xl border border-white/10 bg-[#0f1216]/70 px-10 py-3 text-sm text-white shadow-sm outline-none transition focus:border-[#ffb04f] focus:ring-2 focus:ring-[#ffb04f]/30 @error('email') !border-rose-500 !ring-rose-500/30 @enderror" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-rose-300" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-[#c3c9d2]" />
                <div class="relative mt-2">
                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[#8b95a1]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M7 11V8a5 5 0 0 1 10 0v3" />
                            <rect x="5" y="11" width="14" height="9" rx="2" />
                        </svg>
                    </span>
                    <x-text-input id="password" class="block w-full rounded-xl border border-white/10 bg-[#0f1216]/70 px-10 py-3 text-sm text-white shadow-sm outline-none transition focus:border-[#ffb04f] focus:ring-2 focus:ring-[#ffb04f]/30 @error('password') !border-rose-500 !ring-rose-500/30 @enderror"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-rose-300" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-sm text-[#aeb5bf]">
                <label for="remember_me" class="inline-flex items-center gap-2">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border border-white/20 bg-[#0f1216] text-[#ffb04f] focus:ring-2 focus:ring-[#ffb04f]/40" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="font-semibold text-[#ffb04f] hover:text-[#ffcc7f] focus:outline-none focus:ring-2 focus:ring-[#ffb04f]/40" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-sm text-[#9aa3ad]">
                    New here?
                    <a class="font-semibold text-[#ffb04f] hover:text-[#ffcc7f]" href="{{ route('register') }}">Create an account</a>
                </p>
                <x-primary-button class="inline-flex items-center justify-center !rounded-xl !bg-[#ffb04f] !px-6 !py-3 !text-sm !font-semibold !normal-case !tracking-normal text-[#1a1e24] shadow-[0_18px_35px_-20px_rgba(255,176,79,0.85)] transition hover:!bg-[#ffcc7f] focus:ring-2 focus:ring-[#ffb04f]/40">
                    {{ __('Ride In') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
