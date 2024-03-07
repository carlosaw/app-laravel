@csrf
<div class="w-1/2 container mx-auto flex flex-col gap-10
            pl-4 pr-4 pt-8">
    <h1 class="text-2xl text-center text-gray-800 font-semibold">
        @if(isset($user))
            {{ route('users.edit', $user->id) ? 'Editar Usuário' : ''}}
        @else
            {{ route('users.create') ? 'Novo Usuário' : ''}}
        @endif
    </h1>
    <input class="rounded-md py-2 px-3 outline-none text-lg border border-gray-300" type="text" name="name" placeholder="Nome:" value="{{ $user->name ?? old('name') }}" />
    <input class="rounded-md py-2 px-3 outline-none text-lg border border-gray-300" type="email" name="email" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}" />
    <input class="rounded-md py-2 px-3 outline-none text-lg border border-gray-300" type="password" name="password" placeholder="Senha:" />
    <div class="flex justify-center items-center">
        <button class="w-full bg-blue-400 text-center
                       py-2 text-2xl text-white rounded-md hover:opacity-75"
             type="submit">
             Enviar
        </button>
    </div>

</div>
