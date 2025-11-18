@props([
    'value' => null,
    'required' => false,
])

<label {{ $attributes->merge(['class' => 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70']) }}>
    {{ $value ?? $slot }}
    @if($required)
    <span class="text-red-500">*</span>
    @endif
</label>
