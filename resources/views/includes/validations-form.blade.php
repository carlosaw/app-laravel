@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <div class="border-l-4 border-red-400 bg-orange-100 px-3 py-2">
                <li class="error">{{ $error }}</li>
            </div>
        @endforeach
    </ul>
@endif
