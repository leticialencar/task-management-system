@props(['label', 'name'])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        {{ $label }}
    </label>
    <textarea 
        name="{{ $name }}" 
        id="{{ $name }}" 
        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
    >{{ old($name) }}</textarea>
    <x-form.error :name="$name" />
</div>