<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            Editar Tarefa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-md rounded-xl p-6">
                
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-600 dark:text-red-400">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Título</label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title', $task->title) }}"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-[#8142fc]" />
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Descrição</label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-[#8142fc]">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Status</label>
                        <select name="status" id="status"
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-[#8142fc]">
                            <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>Pendente</option>
                            <option value="in_progress" {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}>Em andamento</option>
                            <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>Concluído</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3">

                        <a href="{{ route('tasks.index') }}" 
                           class="px-4 py-2 rounded-md bg-gray-400 hover:bg-gray-500 text-white transition">
                            Cancelar
                        </a>

                        <button type="submit" 
                                class="px-4 py-2 rounded-md bg-[#8142fc] hover:bg-[#582dae] text-white transition">
                            Atualizar Tarefa
                        </button>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
