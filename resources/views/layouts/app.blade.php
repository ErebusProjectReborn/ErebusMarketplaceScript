<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Erebus')</title>
<link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

</head>
<body>
<div id="app">
@include('components.navbar')
@include('components.alerts')

<main>
<div class="main-center">
@yield('content')
</div>
</main>

@include('components.footer')
</div>
</body>
</html>
