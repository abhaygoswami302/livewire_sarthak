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

    <div class="flex justify-center my-10 ">
        <div class="w-10/12 flex justify-start">
            <div class="w-5/12 rounded-lg border border-indigo-300 p-2 m-2 shadow-lg">
                <livewire:tickets />
            </div>
            <div class="w-7/12 rounded-lg border border-indigo-300 p-2 m-2 shadow-lg">
                <livewire:comments />
            </div>
        </div>
    </div>

<script>
    Livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0];

        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
            //console.log(reader.result)
        }

        reader.readAsDataURL(file);
    })
</script>
</body>
</html>