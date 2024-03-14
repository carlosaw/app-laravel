<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') - Aw2Web</title>
  {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('assets/images/favicon.ico') }}"/> --}}
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
  <script src="{{ asset('https://cdn.tailwindcss.com') }}"></script>
</head>
<body class="bg-gray-50">

  <div class="container mx-auto px-4 py-8">
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <div class="flex justify-end">
        <button type="submit" class="hover:opacity-75">
            <img src="{{asset('assets/images/logout.jpg')}}" alt="logout" width="30" title="Logout"/>
        </button>
    </div>
    </form>
    @yield('content')
  </div>
</body>
</html>
