@if($errors->any())
    <div id="error-box" 
         class="fixed top-24 right-4 z-50 max-w-md w-full p-4 bg-red-600 text-white rounded shadow-md opacity-0 transform -translate-y-5 transition-all duration-500 break-words">

        <button type="button" 
                onclick="closeErrorBox()" 
                class="absolute top-2 right-2 font-bold text-white hover:text-gray-200">
            &times;
        </button>

        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
