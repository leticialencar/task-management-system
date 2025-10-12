<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Dashboard</h1>

        <div class="grid grid-cols-3 gap-6">
            @foreach ($percentages as $status => $value)
                <x-charts.status-chart :status="$status" :value="$value" />
            @endforeach
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Últimas Tarefas</h2>
            <ul class="bg-white dark:bg-gray-800 shadow rounded-lg divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($latestTasks as $task)
                    <li class="p-4 flex justify-between text-gray-900 dark:text-gray-100">
                        <span>{{ $task->title }}</span>
                        <span class="text-gray-500 dark:text-gray-400 text-sm">{{ $task->created_at->format('m/d/Y H:i') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
