<x-app-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Progresso</h2>
        <div class="grid grid-cols-3 gap-6">
            @foreach ($percentages as $status => $value)
                <x-charts.status-chart :status="$status" :value="$value" />
            @endforeach
        </div>

        <div class="mt-8 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Últimas Tarefas</h2>
            <div class="flex gap-2">
                <a href="{{ route('tasks.create') }}"
                   class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-white bg-[#8142fc] hover:bg-[#582dae] rounded-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Adicionar
                </a>

                <a href="{{ route('tasks.index') }}"
                   class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-800 dark:text-gray-100 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                    Todas
                </a>
            </div>
        </div>

        <ul class="mt-4 bg-white dark:bg-gray-800 shadow rounded-lg divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($latestTasks as $task)
                <li class="p-4 flex justify-between text-gray-900 dark:text-gray-100">
                    <span>{{ $task->title }}</span>
                    <span class="text-gray-500 dark:text-gray-400 text-sm">{{ $task->created_at->format('m/d/Y H:i') }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
