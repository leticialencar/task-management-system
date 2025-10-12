@props(['status', 'value'])

@php

    $normalized = str_replace('_', ' ', trim(strtolower($status)));

    switch ($normalized) {
        case 'pending':
            $color = '#FACC15'; 
            break;
        case 'completed':
            $color = '#22C55E'; 
            break;
        case 'in progress':
            $color = '#3B82F6'; 
            break;
        default:
            $color = '#9CA3AF';
            break;
    }

    $statusPT = match($normalized) {
        'pending' => 'Pendente',
        'completed' => 'Concluído',
        'in progress' => 'Em andamento',
        default => ucfirst($status),
    };

    $radius = 60; 
    $circumference = 2 * M_PI * $radius;
    $offset = $circumference - ($value / 100) * $circumference;

@endphp

<div class="bg-white dark:bg-gray-800 shadow p-6 rounded-lg text-center">
    <h2 class="font-semibold capitalize mb-4 text-gray-900 dark:text-gray-100">{{ $statusPT }}</h2>

    <div class="relative inline-flex items-center justify-center">
        <svg width="160" height="160">

            <circle
                cx="80" cy="80" r="{{ $radius }}"
                stroke="#E5E7EB" 
                stroke-width="10"
                fill="none"
                class="dark:stroke-gray-700"/>

            <circle
                cx="80" cy="80" r="{{ $radius }}"
                stroke="{{ $color }}" 
                stroke-width="10"
                fill="none"
                stroke-linecap="round"
                stroke-dasharray="{{ $circumference }}"
                stroke-dashoffset="{{ $offset }}"
                style="transition: stroke-dashoffset 1s ease;"/>

        </svg>
        <span class="absolute text-2xl font-bold" style="color: {{ $color }}">
            {{ number_format($value, 1) }}%
        </span>
    </div>
</div>
