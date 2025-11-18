@props([
    'title' => null,
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'rounded-lg border border-slate-200 bg-white text-slate-950 shadow-sm']) }}>
    @if($title || $description)
    <div class="flex flex-col space-y-1.5 p-6">
        @if($title)
        <h3 class="text-2xl font-semibold leading-none tracking-tight">{{ $title }}</h3>
        @endif
        @if($description)
        <p class="text-sm text-slate-500">{{ $description }}</p>
        @endif
    </div>
    @endif

    <div class="p-6 pt-0">
        {{ $slot }}
    </div>
</div>
