<x-layout title="Entrar · Movecta Audit">
    <div class="grid min-h-screen lg:grid-cols-2">

        {{-- Left — brand panel --}}
        <div class="relative hidden overflow-hidden border-r border-white/5 bg-[linear-gradient(160deg,#0b1016_0%,#070a0e_55%,#050708_100%)] lg:flex lg:flex-col lg:justify-between lg:px-14 lg:py-12">

            <x-logo label="Movecta" subtitle="Audit Platform" />

            {{-- headline + illustration --}}
            <div class="flex flex-col gap-10">
                <div class="max-w-md">
                    <h2 class="text-[28px] font-semibold leading-tight tracking-tight text-white">
                        Cada container, cada documento, auditado com precisão.
                    </h2>
                    <p class="mt-3 text-sm leading-relaxed text-zinc-500">
                        Cruzamos automaticamente sua lista de containers e mercadorias com os dados da Receita Federal para apontar divergências antes que elas virem problema.
                    </p>
                </div>

                {{-- container audit illustration --}}
                <div class="relative h-56 w-full max-w-md overflow-hidden rounded-xl border border-white/10 bg-white/2">
                    <div class="absolute inset-5 flex flex-col justify-center gap-3">
                        <div class="relative h-5 w-full overflow-hidden rounded-md bg-sky-400/[0.07] ring-1 ring-inset ring-sky-400/15">
                            <div class="absolute inset-y-0 left-0 w-1.5 bg-sky-400/60"></div>
                        </div>
                        <div class="relative h-5 w-11/12 overflow-hidden rounded-md bg-amber-400/[0.07] ring-1 ring-inset ring-amber-400/15">
                            <div class="absolute inset-y-0 left-0 w-1.5 bg-amber-400/60"></div>
                            <div class="absolute right-2 top-1/2 flex h-3.5 w-3.5 -translate-y-1/2 items-center justify-center rounded-full bg-emerald-400 text-[8px] font-bold leading-none text-emerald-950">✓</div>
                        </div>
                        <div class="relative h-5 w-full overflow-hidden rounded-md bg-slate-400/[0.07] ring-1 ring-inset ring-slate-400/15">
                            <div class="absolute inset-y-0 left-0 w-1.5 bg-slate-400/60"></div>
                        </div>
                        <div class="relative h-5 w-4/5 overflow-hidden rounded-md bg-emerald-400/[0.07] ring-1 ring-inset ring-emerald-400/15">
                            <div class="absolute inset-y-0 left-0 w-1.5 bg-emerald-400/60"></div>
                            <div class="absolute right-2 top-1/2 flex h-3.5 w-3.5 -translate-y-1/2 items-center justify-center rounded-full bg-emerald-400 text-[8px] font-bold leading-none text-emerald-950">✓</div>
                        </div>
                        <div class="relative h-5 w-full overflow-hidden rounded-md bg-sky-400/[0.07] ring-1 ring-inset ring-sky-400/15">
                            <div class="absolute inset-y-0 left-0 w-1.5 bg-sky-400/60"></div>
                        </div>
                        <div class="relative h-5 w-11/12 overflow-hidden rounded-md bg-slate-400/[0.07] ring-1 ring-inset ring-slate-400/15">
                            <div class="absolute inset-y-0 left-0 w-1.5 bg-slate-400/60"></div>
                        </div>
                    </div>

                    {{-- scanning beam --}}
                    <div class="pointer-events-none absolute inset-x-0 animate-[scan-beam_4s_linear_infinite]">
                        <div class="relative h-px w-full bg-linear-to-r from-transparent via-emerald-400 to-transparent shadow-[0_0_10px_1px_rgba(52,211,153,0.8)]">
                            <span class="absolute -top-1 left-1/2 h-2 w-px -translate-x-8 bg-emerald-400/70"></span>
                            <span class="absolute -top-1 left-1/2 h-2 w-px translate-x-8 bg-emerald-400/70"></span>
                        </div>
                        <div class="h-28 w-full bg-linear-to-b from-emerald-400/20 via-emerald-400/5 to-transparent"></div>
                    </div>
                </div>
            </div>

            {{-- footer status --}}
            <div class="flex items-center gap-2 text-xs text-zinc-600">
                <span class="relative flex h-1.5 w-1.5">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400/60"></span>
                    <span class="relative inline-flex h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                </span>
                Sistema operacional · Plataforma interna Movecta
            </div>
        </div>

        {{-- Right — form panel --}}
        <div class="flex flex-col items-center justify-center px-6 py-16 sm:px-12">
            <div class="w-full max-w-sm">

                <div class="mb-10 lg:hidden">
                    <x-logo label="Movecta Audit" />
                </div>

                <div class="mb-8">
                    <h1 class="text-2xl font-semibold tracking-tight text-white">Entrar</h1>
                    <p class="mt-1.5 text-sm text-zinc-500">Acesse o painel de auditoria.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-md border border-rose-900/40 bg-rose-950/40 px-3 py-2.5 text-sm text-rose-400">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/login') }}" class="flex flex-col gap-8">
                    @csrf

                    <div class="relative">
                        <input
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required
                            autofocus
                            placeholder=" "
                            class="peer w-full border-0 border-b border-white/15 bg-transparent px-0 py-2.5 text-sm text-white outline-none transition-colors focus:border-emerald-400 focus:ring-0"
                        >
                        <label for="email" class="pointer-events-none absolute left-0 top-2.5 origin-left text-sm text-zinc-500 transition-all duration-200 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-emerald-400 peer-not-placeholder-shown:-top-4 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:text-zinc-400">
                            E-mail
                        </label>
                    </div>

                    <div class="relative">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                            placeholder=" "
                            class="peer w-full border-0 border-b border-white/15 bg-transparent px-0 py-2.5 pr-7 text-sm text-white outline-none transition-colors focus:border-emerald-400 focus:ring-0"
                        >
                        <label for="password" class="pointer-events-none absolute left-0 top-2.5 origin-left text-sm text-zinc-500 transition-all duration-200 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-emerald-400 peer-not-placeholder-shown:-top-4 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:text-zinc-400">
                            Senha
                        </label>
                        <button
                            type="button"
                            data-toggle-password="password"
                            aria-label="Mostrar senha"
                            class="absolute right-0 top-2 text-zinc-500 transition hover:text-zinc-300"
                        >
                            <svg data-icon-eye viewBox="0 0 24 24" fill="none" class="h-4 w-4">
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.6"/>
                            </svg>
                            <svg data-icon-eye-off viewBox="0 0 24 24" fill="none" class="hidden h-4 w-4">
                                <path d="M3 3l18 18M10.6 10.6a3 3 0 0 0 4.24 4.24M6.5 6.7C4.2 8.2 2 12 2 12s3.5 7 10 7c1.9 0 3.5-.5 4.9-1.2M9.9 5.2A10.4 10.4 0 0 1 12 5c6.5 0 10 7 10 7-.4.7-1.1 1.8-2.1 2.9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>

                    <div class="-mt-2 flex items-center justify-between">
                        <label class="flex select-none items-center gap-2 text-sm text-zinc-500">
                            <input type="checkbox" name="remember" class="h-3.5 w-3.5 rounded-sm border-zinc-700 bg-transparent accent-emerald-400 focus:ring-0 focus:ring-offset-0">
                            Manter conectado
                        </label>
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-lg bg-linear-to-b from-emerald-400 to-emerald-500 py-2.5 text-sm font-medium text-emerald-950 shadow-[0_1px_0_0_rgba(255,255,255,0.25)_inset,0_8px_20px_-8px_rgba(16,185,129,0.5)] transition hover:from-emerald-300 hover:to-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400/40 focus:ring-offset-2 focus:ring-offset-[#05070a]"
                    >
                        Entrar
                    </button>
                </form>

                <p class="mt-8 text-center text-xs text-zinc-600">
                    Acesso restrito a colaboradores autorizados da Movecta.
                </p>
            </div>
        </div>
    </div>
</x-layout>
