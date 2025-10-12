@props(['status', 'search' => ''])

@php
    $messages = [
        '' => 'Você ainda não possui nenhuma tarefa. Adicione uma nova para vê-la aqui!',
        'pending' => 'Você não possui nenhuma tarefa pendente no momento.',
        'in_progress' => 'Você não possui nenhuma tarefa em andamento.',
        'completed' => 'Você ainda não possui nenhuma tarefa concluída.',
    ];

    $message = $messages[$status] ?? $messages[''];

    if(!empty($search)) {
        $message = "Nenhuma tarefa encontrada para \"{$search}\".";
    }
@endphp

<p class="text-gray-600 dark:text-gray-400 text-center text-lg">
    {{ $message }}
</p>
