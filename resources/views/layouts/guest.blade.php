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
    <body class="relative bg-[#101114] font-['Manrope'] text-slate-100 antialiased">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.06),transparent_55%)]"></div>
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_bottom,rgba(0,0,0,0.6),transparent_60%)]"></div>
        <div class="pointer-events-none absolute inset-0 opacity-[0.18] mix-blend-soft-light bg-[linear-gradient(120deg,rgba(255,255,255,0.04)_0,rgba(255,255,255,0.02)_2px,transparent_3px,transparent_6px)]"></div>
        <div class="pointer-events-none absolute inset-0 opacity-[0.12] bg-[radial-gradient(circle,rgba(255,255,255,0.07)_1px,transparent_1px)] [background-size:6px_6px]"></div>

        <div class="relative min-h-screen">
            <div class="mx-auto flex min-h-screen w-full max-w-6xl flex-col px-4 py-8 lg:py-12">
                <div class="grid flex-1 items-stretch gap-6 lg:grid-cols-2">
                    <div class="relative overflow-hidden rounded-3xl bg-[#14161b] p-8 shadow-[0_30px_75px_-50px_rgba(0,0,0,0.9)]">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.05),transparent_60%)]"></div>
                        <div class="absolute inset-0 opacity-[0.08] bg-[radial-gradient(circle,rgba(255,255,255,0.08)_1px,transparent_1px)] [background-size:5px_5px]"></div>
                        <div class="absolute inset-0 opacity-[0.25] bg-[linear-gradient(90deg,rgba(255,255,255,0.05)_0,transparent_10%,transparent_90%,rgba(255,255,255,0.03)_100%)]"></div>
                        <div class="absolute inset-0">
                            <svg class="h-full w-full opacity-[0.08]" viewBox="0 0 800 600" aria-hidden="true">
                                <path d="M120 380c120-60 260-80 390-40 70 20 130 60 170 120" stroke="#ffffff" stroke-width="14" stroke-linecap="round" fill="none" />
                                <path d="M90 330c90-40 210-60 330-30 50 12 100 36 140 70" stroke="#ffffff" stroke-width="10" stroke-linecap="round" fill="none" />
                            </svg>
                        </div>

                        <div class="relative z-10 flex h-full flex-col">
                            <a href="/" class="inline-flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.3em] text-[#d3d7de]">
                                <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl border border-white/15 bg-white/5 text-white shadow-[0_0_18px_rgba(255,255,255,0.08)]">
                                    <svg viewBox="0 0 48 48" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 28h24M16 28l3-8h10l3 8M18 28v5a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-5" />
                                        <circle cx="18" cy="28" r="3" />
                                        <circle cx="30" cy="28" r="3" />
                                        <path d="M19 18h10l4 4" />
                                    </svg>
                                </span>
                                <span class="flex flex-col leading-tight">
                                    <span class="text-sm font-semibold tracking-[0.2em]">EL MAHI MOTO SHOP</span>
                                    <span class="text-[10px] font-medium tracking-[0.35em] text-[#a6adb7]">Yamaha Agence Exclusif</span>
                                </span>
                            </a>

                            <div class="mt-8">
                                <p class="text-xs font-semibold uppercase tracking-[0.32em] text-[#a6adb7]">Premium moto marketplace</p>
                                <h1 class="mt-3 max-w-sm font-['Bebas_Neue'] text-4xl leading-tight text-[#d6a756] sm:text-5xl">
                                    BUILT FOR RIDERS &amp; MOTO SHOPS
                                </h1>
                                <p class="mt-4 max-w-sm text-sm text-[#b5bcc6]">
                                    Discover trusted local motorcycle sellers, parts, and services — powered by EL MAHI MOTO SHOP.
                                </p>
                                <div class="mt-6 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-4 py-2 text-xs font-semibold text-[#d8dde4]">
                                    <span class="h-2 w-2 rounded-full bg-[#ffb04f]"></span>
                                    Official Yamaha Agency • Trusted by Riders
                                </div>
                            </div>

                            <div class="mt-auto">
                                <div class="rounded-2xl border border-white/10 bg-[#111318]/70 p-6 shadow-[0_25px_55px_-40px_rgba(0,0,0,0.7)]">
                                    <svg viewBox="0 0 560 260" class="h-44 w-full opacity-90" aria-hidden="true">
                                        <path d="M40 210H520" stroke="#2f3944" stroke-width="10" stroke-linecap="round" />
                                        <path d="M110 170h140l30-40h90l40 40h60" stroke="#c6cdd7" stroke-width="6" stroke-linecap="round" />
                                        <circle cx="150" cy="200" r="30" stroke="#a6adb8" stroke-width="6" fill="none" />
                                        <circle cx="430" cy="200" r="30" stroke="#a6adb8" stroke-width="6" fill="none" />
                                        <circle cx="150" cy="200" r="12" fill="#5f6874" />
                                        <circle cx="430" cy="200" r="12" fill="#5f6874" />
                                        <path d="M230 165l28-40h70l20 30" stroke="#9aa2ad" stroke-width="6" stroke-linecap="round" />
                                        <path d="M300 125l32-20" stroke="#7c8591" stroke-width="6" stroke-linecap="round" />
                                        <path d="M260 118h40" stroke="#ffb04f" stroke-width="6" stroke-linecap="round" />
                                        <path d="M90 110c20-12 50-12 70 0" stroke="#6c7480" stroke-width="5" stroke-linecap="round" />
                                        <path d="M430 92c30 6 55 20 70 40" stroke="#6c7480" stroke-width="5" stroke-linecap="round" />
                                        <path d="M80 72c40-18 90-24 140-10" stroke="#2b3138" stroke-width="6" stroke-linecap="round" />
                                        <path d="M70 150c20 10 40 10 60 0" stroke="#2b3138" stroke-width="4" stroke-linecap="round" />
                                        <path d="M380 110l18-10" stroke="#8b949f" stroke-width="6" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <p class="mt-4 text-xs text-[#9aa3ad]">Premium moto garage aesthetic with refined craftsmanship.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex items-center">
                        <div class="absolute inset-0 -z-10 rounded-3xl bg-[#101217]"></div>
                        <div class="w-full rounded-3xl border border-white/15 bg-white/5 p-6 shadow-[0_35px_75px_-50px_rgba(0,0,0,0.95)] backdrop-blur-2xl sm:p-8">
                            <div class="pointer-events-none absolute inset-0 rounded-3xl ring-1 ring-white/10"></div>
                            <div class="pointer-events-none absolute inset-0 rounded-3xl shadow-[inset_0_0_50px_rgba(255,185,90,0.08)]"></div>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
