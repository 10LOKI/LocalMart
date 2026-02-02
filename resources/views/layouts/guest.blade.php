<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=bebas-neue:400&family=manrope:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#0f1115] font-['Manrope'] text-slate-100 antialiased">
        <div class="min-h-screen">
            <div class="mx-auto flex min-h-screen w-full max-w-6xl flex-col px-4 py-8 lg:py-12">
                <div class="grid flex-1 items-stretch gap-6 lg:grid-cols-2">
                    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#1a1e24] via-[#15181d] to-[#0f1115] p-8 shadow-[0_25px_70px_-45px_rgba(0,0,0,0.85)]">
                        <div class="absolute -right-12 -top-12 h-44 w-44 rounded-full bg-[#24303a]/60 blur-3xl"></div>
                        <div class="absolute -bottom-10 -left-10 h-40 w-40 rounded-full bg-[#2b2216]/70 blur-3xl"></div>
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,176,79,0.08),transparent_55%)]"></div>

                        <div class="relative z-10 flex h-full flex-col">
                            <a href="/" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.28em] text-[#c0c6cf]">
                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-white/5 text-[#cbd3df] shadow-[0_0_20px_rgba(255,187,92,0.12)]">
                                    <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path d="M4 16h16M6 16l2-6h8l2 6M7 16v3a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-3" />
                                        <circle cx="8" cy="16" r="2" />
                                        <circle cx="16" cy="16" r="2" />
                                    </svg>
                                </span>
                                LocalMoto
                            </a>

                            <div class="mt-8">
                                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#a4adb8]">Moto marketplace</p>
                                <h1 class="mt-3 max-w-sm font-['Bebas_Neue'] text-4xl leading-tight text-[#f2f4f7] sm:text-5xl">
                                    Built for Riders &amp; Sellers
                                </h1>
                                <p class="mt-4 max-w-sm text-sm text-[#aeb5bf]">
                                    Discover local moto shops, custom builds, and trusted gear from riders who know the road.
                                </p>
                                <div class="mt-6 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs font-semibold text-[#d4d9e0]">
                                    <span class="h-2 w-2 rounded-full bg-[#ffb04f]"></span>
                                    Trusted by local moto shops &amp; riders
                                </div>
                            </div>

                            <div class="mt-auto">
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-6 shadow-[0_25px_55px_-40px_rgba(0,0,0,0.7)]">
                                    <svg viewBox="0 0 560 260" class="h-44 w-full" aria-hidden="true">
                                        <defs>
                                            <linearGradient id="moto-haze" x1="0" x2="1" y1="0" y2="1">
                                                <stop offset="0%" stop-color="#1d222a" />
                                                <stop offset="100%" stop-color="#11151a" />
                                            </linearGradient>
                                            <linearGradient id="moto-metal" x1="0" x2="1" y1="0" y2="1">
                                                <stop offset="0%" stop-color="#c4ccd6" />
                                                <stop offset="100%" stop-color="#7f8894" />
                                            </linearGradient>
                                        </defs>
                                        <rect x="0" y="0" width="560" height="260" rx="24" fill="url(#moto-haze)" />
                                        <path d="M40 210H520" stroke="#2f3944" stroke-width="10" stroke-linecap="round" />
                                        <path d="M120 170h110l40-40h80l35 40h60" stroke="url(#moto-metal)" stroke-width="6" stroke-linecap="round" />
                                        <circle cx="160" cy="200" r="30" stroke="#a2acb8" stroke-width="6" fill="none" />
                                        <circle cx="430" cy="200" r="30" stroke="#a2acb8" stroke-width="6" fill="none" />
                                        <circle cx="160" cy="200" r="12" fill="#606b77" />
                                        <circle cx="430" cy="200" r="12" fill="#606b77" />
                                        <path d="M220 165l30-40h60l20 30" stroke="#9aa3ad" stroke-width="6" stroke-linecap="round" />
                                        <path d="M300 125l30-20" stroke="#7f8894" stroke-width="6" stroke-linecap="round" />
                                        <path d="M260 118h40" stroke="#ffb04f" stroke-width="6" stroke-linecap="round" />
                                        <path d="M90 110c20-12 50-12 70 0" stroke="#6d7782" stroke-width="5" stroke-linecap="round" />
                                        <path d="M440 90c30 6 55 20 70 40" stroke="#6d7782" stroke-width="5" stroke-linecap="round" />
                                        <path d="M90 70c40-18 90-24 140-10" stroke="#2a323b" stroke-width="6" stroke-linecap="round" />
                                        <path d="M70 150c20 10 40 10 60 0" stroke="#2a323b" stroke-width="4" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <p class="mt-4 text-xs text-[#9aa3ad]">Crafted for modern garages and trusted riders.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex items-center">
                        <div class="absolute inset-0 -z-10 rounded-3xl bg-gradient-to-br from-[#1a1f26] via-[#14181f] to-[#0f1217]"></div>
                        <div class="w-full rounded-3xl border border-white/10 bg-white/5 p-6 shadow-[0_30px_70px_-45px_rgba(0,0,0,0.9)] backdrop-blur-2xl sm:p-8">
                            <div class="pointer-events-none absolute inset-0 rounded-3xl ring-1 ring-white/10"></div>
                            <div class="pointer-events-none absolute inset-0 rounded-3xl shadow-[inset_0_0_40px_rgba(255,176,79,0.08)]"></div>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
