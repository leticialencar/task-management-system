@props(['currentStatus'])

@php
    $statuses = [
        '' => 'Todos',
        'pending' => 'Pendente',
        'in_progress' => 'Em andamento',
        'completed' => 'Concluído',
    ];
@endphp

<div class="flex justify-center space-x-4 mb-6">
    @foreach($statuses as $key => $label)
        <a href="{{ route('tasks.index', ['status' => $key]) }}"
           class="px-4 py-2 rounded-lg font-medium transition
                  {{ $currentStatus === $key ? 'bg-[#8142fc] text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600' }}">
            {{ $label }}
        </a>
    @endforeach
</div>
