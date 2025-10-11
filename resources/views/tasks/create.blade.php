<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Tarefa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <x-form.input label="Título" name="title" required maxlength="255" />
                    <x-form.textarea label="Descrição" name="description" />

                    <x-form.select 
                        label="Status" 
                        name="status" 
                        :options="['pending' => 'Pendente', 'in_progress' => 'Em andamento', 'completed' => 'Concluída']" />

                    <x-primary-button>Criar Tarefa</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>