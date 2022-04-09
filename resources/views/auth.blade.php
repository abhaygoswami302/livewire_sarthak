<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <livewire:styles />
    <livewire:scripts />

</head>
<body class="bg-indigo-100">
    
    @include('partials.nav')

    <div class="w-full my-10 flex justify-center">
        <div class="w-5/12 rounded-lg border border-indigo-300 bg-indigo-300 p-2 my-10 shadow outline outline-offset-4 outline-1 outline-indigo-400">
            @if (Route::currentRouteName() == 'login')
            <livewire:login/>
            @else
            <livewire:register/>
            @endif
        </div>
    </div>

</body>
</html>