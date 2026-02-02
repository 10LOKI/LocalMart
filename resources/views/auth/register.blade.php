<x-guest-layout>
    <div class="space-y-6 text-[#e8ebf0]">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#9aa3ad]">Create your account</p>
            <h2 class="mt-3 font-['Bebas_Neue'] text-4xl tracking-wide text-white sm:text-5xl">Built for Riders &amp; Sellers</h2>
            <p class="mt-3 text-sm text-[#b3bcc7]">List your shop, gear up with trusted sellers, and ride with the community.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="role" :value="__('I am joining as')" class="text-sm font-semibold text-[#c3c9d2]" />
                <div class="mt-2 flex w-full rounded-2xl border border-white/10 bg-white/5 p-1 text-sm">
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="role" value="client" class="peer sr-only" checked>
                        <span class="block rounded-2xl px-4 py-2 text-center font-semibold text-[#b5bdc8] transition peer-checked:bg-gradient-to-r peer-checked:from-white/20 peer-checked:to-white/10 peer-checked:text-white peer-checked:shadow-[inset_0_0_18px_rgba(255,255,255,0.15)]">
                            Client
                        </span>
                    </label>
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="role" value="seller" class="peer sr-only">
                        <span class="block rounded-2xl px-4 py-2 text-center font-semibold text-[#b5bdc8] transition peer-checked:bg-gradient-to-r peer-checked:from-white/20 peer-checked:to-white/10 peer-checked:text-white peer-checked:shadow-[inset_0_0_18px_rgba(255,255,255,0.15)]">
                            Seller
                        </span>
                    </label>
                </div>
            </div>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full name')" class="text-sm font-semibold text-[#c3c9d2]" />
                <div class="relative mt-2">
                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[#8b95a1]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z" />
                            <path d="M4 20a8 8 0 0 1 16 0" />
                        </svg>
                    </span>
                    <x-text-input id="name" class="block w-full rounded-xl border border-white/10 bg-[#0f1216]/70 px-10 py-3 text-sm text-white shadow-sm outline-none transition focus:border-[#ffb04f] focus:ring-2 focus:ring-[#ffb04f]/30 @error('name') !border-rose-500 !ring-rose-500/30 @enderror" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-rose-300" />
            </div>

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
                    <x-text-input id="email" class="block w-full rounded-xl border border-white/10 bg-[#0f1216]/70 px-10 py-3 text-sm text-white shadow-sm outline-none transition focus:border-[#ffb04f] focus:ring-2 focus:ring-[#ffb04f]/30 @error('email') !border-rose-500 !ring-rose-500/30 @enderror" type="email" name="email" :value="old('email')" required autocomplete="username" />
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
                        required autocomplete="new-password" />
                </div>
                <div class="mt-3 space-y-2">
                    <div class="flex items-center justify-between text-xs text-[#aeb5bf]">
                        <span>Password strength</span>
                        <span id="password-strength-label" class="font-semibold text-[#ffb04f]">Start typing</span>
                    </div>
                    <div class="relative h-3 w-full overflow-hidden rounded-full bg-[#1a1f26]">
                        <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0)_70%)]"></div>
                        <div id="password-strength-bar" class="h-full w-1/4 rounded-full bg-[#5b646f] transition-all duration-300"></div>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-[#9aa3ad]">
                        <span class="inline-flex h-7 w-7 items-center justify-center rounded-full border border-white/10 bg-white/5 text-[10px] uppercase tracking-[0.2em]">RPM</span>
                        <p id="password-help" class="text-xs text-[#9aa3ad]">Use 8+ characters with a mix of letters, numbers, and symbols.</p>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-rose-300" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm password')" class="text-sm font-semibold text-[#c3c9d2]" />
                <div class="relative mt-2">
                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[#8b95a1]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M7 11V8a5 5 0 0 1 10 0v3" />
                            <rect x="5" y="11" width="14" height="9" rx="2" />
                        </svg>
                    </span>
                    <x-text-input id="password_confirmation" class="block w-full rounded-xl border border-white/10 bg-[#0f1216]/70 px-10 py-3 text-sm text-white shadow-sm outline-none transition focus:border-[#ffb04f] focus:ring-2 focus:ring-[#ffb04f]/30 @error('password_confirmation') !border-rose-500 !ring-rose-500/30 @enderror"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-rose-300" />
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-sm text-[#9aa3ad]">
                    Already registered?
                    <a class="font-semibold text-[#ffb04f] hover:text-[#ffcc7f]" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                </p>
                <x-primary-button class="inline-flex items-center justify-center !rounded-xl !bg-[#ffb04f] !px-6 !py-3 !text-sm !font-semibold !normal-case !tracking-normal text-[#1a1e24] shadow-[0_18px_35px_-20px_rgba(255,176,79,0.85)] transition hover:!bg-[#ffcc7f] focus:ring-2 focus:ring-[#ffb04f]/40">
                    {{ __('Create Account') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

@push('scripts')
    <script>
        (() => {
            const input = document.getElementById('password');
            const bar = document.getElementById('password-strength-bar');
            const label = document.getElementById('password-strength-label');
            const help = document.getElementById('password-help');
            if (!input || !bar || !label || !help) return;

            const levels = [
                { text: 'Start typing', width: '20%', color: '#5b646f' },
                { text: 'Low RPM', width: '35%', color: '#c17a6b' },
                { text: 'Cruising', width: '60%', color: '#e0b15f' },
                { text: 'Strong', width: '85%', color: '#ffb04f' },
                { text: 'Full Throttle', width: '100%', color: '#4aa0ff' },
            ];

            const scorePassword = (value) => {
                let score = 0;
                if (value.length >= 8) score += 1;
                if (/[A-Z]/.test(value)) score += 1;
                if (/[0-9]/.test(value)) score += 1;
                if (/[^A-Za-z0-9]/.test(value)) score += 1;
                return score;
            };

            const update = () => {
                const score = scorePassword(input.value);
                const level = levels[score];
                bar.style.width = level.width;
                bar.style.backgroundColor = level.color;
                label.textContent = level.text;
                help.textContent = score < 2
                    ? 'Add more variety with uppercase letters, numbers, or symbols.'
                    : 'Strong build. Keep it memorable but unique.';
            };

            input.addEventListener('input', update);
            update();
        })();
    </script>
@endpush
