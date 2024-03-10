@csrf
<div class="p-6 container min-w-full leading-normal shadow-md rounded-lg flex flex-col border bg-white">
    <textarea autofocus name="body" id="" rows="10"
        placeholder="Digite seu comentário"
        class="focus:outline-none focus:ring shadow-md rounded-lg mb-4"
    >
        {{ $comment->body ?? old('body') }}
    </textarea>
    <label for="visible">
        <input class="mb-4" type="checkbox" name="visible"
            @if(isset($comment) && $comment->visible)
                checked="checked"
            @endif
        />
        Visível?
    </label>

    <div class="flex justify-between items-center">
        <button class="cursor-pointer w-1/3 bg-blue-500 text-center py-2 text-xl text-white rounded-md hover:opacity-75" type="submit">Enviar</button>
        <a href="{{ URL::previous() }}" class="cursor-pointer w-1/3 bg-blue-500 text-center py-2 text-xl text-white rounded-md hover:opacity-75">Cancelar</a>
    </div>

</div>
