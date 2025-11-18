@props([
    'name' => null,
    'size' => 5, // Tailwind size class number (4, 5, 6, etc.)
])

@php
// Simple icon wrapper - you can integrate with Heroicons or any icon library
$sizeClass = 'w-' . $size . ' h-' . $size;
@endphp

@if($name)
    {{-- Using inline SVG or icon font --}}
    <svg {{ $attributes->merge(['class' => $sizeClass . ' flex-shrink-0']) }} fill="none" stroke="currentColor" viewBox="0 0 24 24">
        {{ $slot }}
    </svg>
@else
    <span {{ $attributes->merge(['class' => $sizeClass . ' inline-flex items-center justify-center']) }}>
        {{ $slot }}
    </span>
@endif
