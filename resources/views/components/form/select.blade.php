@props(['label', 'name', 'options'])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        {{ $label }}
    </label>
    <select 
        name="{{ $name }}" 
        id="{{ $name }}" 
        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
    >
        @foreach ($options as $value => $labelOption)
            <option value="{{ $value }}" {{ old($name) == $value ? 'selected' : '' }}>
                {{ $labelOption }}
            </option>
        @endforeach
    </select>
    <x-form.error :name="$name" />
</div>
