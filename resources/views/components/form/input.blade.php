@props(['label', 'name', 'type' => 'text', 'required' => false, 'maxlength' => null])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        {{ $label }}
    </label>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        value="{{ old($name) }}"
        @if($required) required @endif
        @if($maxlength) maxlength="{{ $maxlength }}" @endif
        class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
    />
    <x-form.error :name="$name" />
</div>