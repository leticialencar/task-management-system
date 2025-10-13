@props(['messages'])

@php
    $hasMessages = count($messages) > 0;
@endphp

@if($hasMessages)
<div id="success-box" class="fixed top-24 right-4 z-50 max-w-md w-full p-4 bg-green-500 dark:bg-green-700 text-white rounded shadow-md opacity-0 transform -translate-y-5 transition-all duration-500 break-words">
    <button type="button" onclick="closeSuccessBox()" class="absolute top-2 right-2 font-bold text-white hover:text-gray-200">&times;</button>

    @foreach($messages as $message)
        <p>{{ $message }}</p>
    @endforeach
</div>
@endif
