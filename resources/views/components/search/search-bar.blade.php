<form action="{{ $action ?? route('tasks.index') }}" method="GET" class="w-full sm:max-w-lg mx-auto">
    <label for="search-task" class="sr-only">Buscar Tarefa</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input 
            type="search" 
            id="search-task" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="{{ $placeholder ?? 'Pesquisar por título ou descrição da tarefa' }}" 
            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-[#8142fc] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#8142fc] dark:focus:border-[#8142fc]"/>
    </div>
</form>
