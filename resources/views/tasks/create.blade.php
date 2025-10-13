<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Criar Nova Tarefa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl p-8">
                
                <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Título</label>
                        <input type="text" name="title" id="title" required maxlength="255"
                               class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-[#8142fc] transition">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descrição</label>
                        <textarea name="description" id="description" rows="4"
                                  class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-[#8142fc] transition"></textarea>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                        <select name="status" id="status"
                                class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-[#8142fc] transition">
                            <option value="pending">Pendente</option>
                            <option value="in_progress">Em andamento</option>
                            <option value="completed">Concluída</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3">

                    <a href="{{ route('dashboard') }}" 
                           class="px-4 py-2 rounded-md bg-gray-400 hover:bg-gray-500 text-white transition">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 bg-[#8142fc] hover:bg-[#582dae] text-white font-medium rounded-lg shadow-md transition">
                            Criar Tarefa
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
