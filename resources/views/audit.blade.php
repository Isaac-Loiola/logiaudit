<x-layout title="Auditar · Movecta Audit">
    <div class="flex min-h-screen flex-col">

        <header class="border-b border-white/5">
            <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-5 lg:px-8">
                <x-logo label="Movecta Audit" />

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-1.5 text-xs text-zinc-500 transition hover:text-zinc-300">
                        <svg viewBox="0 0 24 24" fill="none" class="h-3.5 w-3.5">
                            <path d="M9 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h4M15 16l4-4-4-4M19 12H8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Sair
                    </button>
                </form>
            </div>
        </header>

        <main class="flex flex-1 items-center justify-center px-6 py-16">
            <div class="w-full max-w-2xl rounded-2xl border border-white/10 bg-white/2 p-8 sm:p-10">
                <span class="inline-flex items-center rounded-full bg-white/5 px-2.5 py-1 text-[11px] font-medium uppercase tracking-wider text-zinc-500 ring-1 ring-inset ring-white/10">
                    Nova auditoria
                </span>
                <h1 class="mt-4 text-2xl font-semibold tracking-tight text-white">Envie os arquivos para iniciar</h1>
                <p class="mt-2 text-sm leading-relaxed text-zinc-500">
                    Precisamos da planilha com a lista de containers e mercadorias do cliente, e do PDF de retorno emitido pela Receita Federal, para cruzar as informações automaticamente.
                </p>

                @if ($errors->any())
                    <div class="mt-6 rounded-md border border-rose-900/40 bg-rose-950/40 px-3 py-2.5 text-sm text-rose-400">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('audit') }}" enctype="multipart/form-data" class="mt-8 flex flex-col gap-8">
                    @csrf

                    <div class="grid gap-5 sm:grid-cols-2">
                        <x-file-drop
                            name="spreadsheet"
                            label="Planilha de containers"
                            hint="Lista de containers e mercadorias do cliente"
                            format="XLSX"
                            accept=".xlsx,.xls,.csv"
                            accent="sky"
                        />

                        <x-file-drop
                            name="revenue"
                            label="Retorno da Receita Federal"
                            hint="PDF entregue pelo porto"
                            format="PDF"
                            accept="application/pdf,.pdf"
                            accent="amber"
                        />
                    </div>

                    <button
                        type="submit"
                        data-submit-audit
                        class="w-full rounded-lg bg-linear-to-b from-emerald-400 to-emerald-500 py-2.5 text-sm font-medium text-emerald-950 shadow-[0_1px_0_0_rgba(255,255,255,0.25)_inset,0_8px_20px_-8px_rgba(16,185,129,0.5)] transition hover:from-emerald-300 hover:to-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400/40 focus:ring-offset-2 focus:ring-offset-[#05070a] disabled:cursor-not-allowed disabled:opacity-40 disabled:shadow-none disabled:hover:from-emerald-400 disabled:hover:to-emerald-500"
                    >
                        Iniciar auditoria
                    </button>
                </form>
            </div>
        </main>
    </div>
</x-layout>
