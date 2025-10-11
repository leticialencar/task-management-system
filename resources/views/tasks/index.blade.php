<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            Minhas Tarefas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-xl sm:rounded-2xl p-8 transition-all duration-300">

                @if($tasks->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400 text-center text-lg">Você ainda não possui nenhuma tarefa. Adicione uma nova para vê-la aqui!</p>
                @else
                    <div class="relative overflow-x-auto rounded-xl shadow-md mt-4">
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
                                    <tr class="bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white text-left">
                                            {{ $task->title }}
                                        </td>
                                        <td class="px-6 py-4 text-left">
                                            {{ $task->description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($task->status === 'pending')
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Pendente</span>
                                            @elseif($task->status === 'in_progress')
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">Em andamento</span>
                                            @else
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">Concluída</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 text-center space-x-3">
                                            <a href="#"
                                            class="inline-block px-4 py-1.5 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition">
                                                Editar
                                            </a>
                                            <a href="#"
                                            class="inline-block px-4 py-1.5 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition">
                                                Deletar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
