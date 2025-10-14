@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge([
        'class' => '
            border-gray-300 
            dark:border-gray-700 
            dark:bg-gray-900 
            dark:text-gray-300 
            focus:border-[#8142fc] 
            dark:focus:border-[#8142fc] 
            focus:ring-[#8142fc] 
            dark:focus:ring-[#8142fc] 
            rounded-md 
            shadow-sm
        '
    ]) }}>