<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mementos</title>
    <link rel="stylesheet" href="{{ asset('dist/css/alert.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @stack('styles')
</head>

<body>
    @if ($errors->any())
        {{-- @dd($errors->all()) --}}
        <x-alert type="danger" :messages="$errors->all()" />
    @endif

    @if (session('success'))
        <x-alert type="success" :messages="session('success')" />
    @endif
    @yield('content')
</body>

</html>
