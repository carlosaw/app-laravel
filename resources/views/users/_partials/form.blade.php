@csrf
<div class="sm:w-full md:w-2/3 container mx-auto flex flex-col gap-10
            pl-4 pr-4 pt-8">
    <h1 class="text-2xl text-center text-gray-800 font-semibold">
        @if(isset($user))
            {{ route('users.edit', $user->id) ? 'Editar Usuário' : ''}}
        @else
            {{ route('users.create') ? 'Novo Usuário' : ''}}
        @endif
    </h1>
    <input class="rounded-md py-2 px-3 outline-none text-lg border border-gray-300" type="text" name="name" placeholder="Nome:" value="{{ $user->name ?? old('name') }}" autofocus />
    <input class="rounded-md py-2 px-3 outline-none text-lg border border-gray-300" type="email" name="email" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}" />
    <input class="rounded-md py-2 px-3 outline-none text-lg border border-gray-300" type="password" name="password" placeholder="Senha:" />
    <input type="file" name="image" class="rounded-md py-2 px-3 outline-none text-lg border border-gray-300" />
    <div class="flex justify-between items-center">
        <button class="cursor-pointer w-1/3 bg-blue-500 text-center py-2 text-xl text-white rounded-md hover:opacity-75" type="submit">Enviar</button>
        <a href="{{ URL::previous() }}" class="cursor-pointer w-1/3 bg-blue-500 text-center py-2 text-xl text-white rounded-md hover:opacity-75">Cancelar</a>
    </div>

</div>
