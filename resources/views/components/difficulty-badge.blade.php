@props(['level'])

@php
    $colors = [
        'Easy' => 'text-green-400 border-green-500',
        'Medium' => 'text-yellow-400 border-yellow-500',
        'Hard' => 'text-red-400 border-red-500',
    ];
@endphp

<span class="px-2 py-1 text-xs border rounded {{ $colors[$level] ?? 'text-gray-400 border-gray-500' }}">
    {{ $level }}
</span>
