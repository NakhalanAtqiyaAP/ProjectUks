<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permission error</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <div class="container flex justify-center items-center h-screen flex-col">
        <img src="{{ asset('images/1702613372.png') }}" alt="logo" width="100" class="mb-5">
        <h1 class="text-2xl font-bold italic">403 FORBIDEN PAGE!</h1>
        <p>You don't have permission to access this page.</p>
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('home.page') }}" class="text-white px-4 py-2 bg-blue-500 hover:bg-blue-700 duration-300 rounded-md mt-5">Back</a>
        @else
            <a href="{{ route('pemb.ps.home') }}" class="text-white px-4 py-2 bg-blue-500 hover:bg-blue-700 duration-300 rounded-md mt-5">Back</a>
            <a href="{{ route('pet.pu.home') }}" class="text-white px-4 py-2 bg-blue-500 hover:bg-blue-700 duration-300 rounded-md mt-5">Back</a>
        @endif
    </div>
</body>

</html>
