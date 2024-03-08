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
    <div class="flex justify-between items-center">
        <x-btnBack>
            <a href="{{ route('users.index') }}">{{ route('users.index') ? 'Voltar' : ''}}</a>
        </x-btnBack>

        <x-btn>
            @if(isset($user))
                {{ route('users.edit', $user->id) ? 'Salvar' : ''}}
            @else
                {{ route('users.create') ? 'Cadastrar' : ''}}
            @endif
        </x-btn>
    </div>

</div>
