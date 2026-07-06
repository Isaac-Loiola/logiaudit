@props(['label' => 'Movecta', 'subtitle' => null])

<div class="flex items-center gap-3">
    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-white/4 ring-1 ring-white/10">
        <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5 text-emerald-400">
            <path d="M4 8V4h4M16 4h4v4M20 16v4h-4M8 20H4v-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M8.5 12.5L11 15l5-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    @if ($subtitle)
        <div class="flex flex-col leading-none">
            <span class="text-sm font-semibold tracking-tight text-white">{{ $label }}</span>
            <span class="mt-1 text-[11px] uppercase tracking-[0.15em] text-zinc-500">{{ $subtitle }}</span>
        </div>
    @else
        <span class="text-sm font-semibold tracking-tight text-white">{{ $label }}</span>
    @endif
</div>
