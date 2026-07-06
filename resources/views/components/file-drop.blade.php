@props(['name', 'label', 'hint', 'format', 'accept', 'accent' => 'slate'])

@php
    $palette = match ($accent) {
        'sky' => [
            'ring' => 'ring-sky-400/20',
            'icon' => 'text-sky-400',
            'chip' => 'bg-sky-400/10 text-sky-400 ring-sky-400/20',
            'active' => 'border-sky-400/50 bg-sky-400/5',
        ],
        'amber' => [
            'ring' => 'ring-amber-400/20',
            'icon' => 'text-amber-400',
            'chip' => 'bg-amber-400/10 text-amber-400 ring-amber-400/20',
            'active' => 'border-amber-400/50 bg-amber-400/5',
        ],
        default => [
            'ring' => 'ring-slate-400/20',
            'icon' => 'text-slate-400',
            'chip' => 'bg-slate-400/10 text-slate-400 ring-slate-400/20',
            'active' => 'border-slate-400/50 bg-slate-400/5',
        ],
    };
    $id = 'file-'.$name;
@endphp

<div data-file-drop data-active-class="{{ $palette['active'] }}">
    <label
        for="{{ $id }}"
        data-dropzone
        class="relative flex min-h-[13rem] cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border border-dashed border-white/15 bg-white/2 p-6 text-center transition-colors hover:border-white/25 hover:bg-white/4"
    >
        <input
            type="file"
            id="{{ $id }}"
            name="{{ $name }}"
            accept="{{ $accept }}"
            data-file-input
            required
            class="sr-only"
        >

        <div data-empty-state class="flex flex-col items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-white/5 ring-1 {{ $palette['ring'] }}">
                <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5 {{ $palette['icon'] }}">
                    <path d="M7 3h7l4 4v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    <path d="M14 3v4h4" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    <path d="M8.5 13h7M8.5 16.5h4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-white">{{ $label }}</p>
                <p class="mt-0.5 text-xs text-zinc-500">{{ $hint }}</p>
            </div>
            <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[11px] font-medium ring-1 ring-inset {{ $palette['chip'] }}">
                {{ $format }}
            </span>
        </div>

        <div data-filled-state class="hidden flex-col items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-400/10 ring-1 ring-emerald-400/30">
                <svg viewBox="0 0 24 24" fill="none" class="h-5 w-5 text-emerald-400">
                    <path d="M5 12.5l4.5 4.5L19 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <p data-file-name class="max-w-[14rem] truncate text-sm font-medium text-white"></p>
            <button
                type="button"
                data-remove-file
                class="text-xs text-zinc-500 transition hover:text-rose-400 hover:underline"
            >
                Remover arquivo
            </button>
        </div>
    </label>
</div>
