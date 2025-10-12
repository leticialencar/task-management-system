<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            Minhas Tarefas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center mb-4">
                <x-search.search-bar :action="route('tasks.index')" />
            </div>

            <div class="flex justify-center mb-6">
                <div class="w-full sm:w-auto">
                    <x-filters.task-filters :currentStatus="request('status', '')" />
                </div>
            </div>

            @if($errors->any())
                <x-alerts.error :errors="$errors" />
            @endif

            @if($tasks->isEmpty())
                <x-filters.empty-message 
                    :status="request('status', '')" 
                    :search="request('search', '')" />
            @else
            
                <div class="relative overflow-x-auto rounded-xl shadow-md">
                    <table class="w-full text-sm text-center text-gray-600 dark:text-gray-300">
                        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-800 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left font-semibold">Título</th>
                                <th scope="col" class="px-6 py-4 text-left font-semibold">Descrição</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Status</th>
                                <th scope="col" class="px-6 py-4 font-semibold">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($tasks as $task)
                                <tr class="bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 transition-all duration-300">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white text-left">
                                        {{ $task->title }}
                                    </td>
                                    <td class="px-6 py-4 text-left">
                                        {{ $task->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($task->status === 'pending')
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                                Pendente
                                            </span>
                                        @elseif($task->status === 'in_progress')
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                Em andamento
                                            </span>
                                        @else
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                                Concluído
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-center space-x-3">
                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                           class="inline-flex items-center gap-1 px-4 py-1.5 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z" />
                                            </svg>
                                            Editar
                                        </a>

                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1 px-4 py-1.5 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition"
                                                onclick="return confirm('Tem certeza que deseja deletar esta tarefa?');">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Deletar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
