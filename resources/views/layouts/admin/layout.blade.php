<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <header class="py-2 bg-dark text-white mb-4">
        <div class="container">
            <h1 class="h3">{{ config('app.name') }}</h1>
        </div>
    </header>

    <div class="container">
        <div class="row">

            <aside class="col-md-3">
                <h4>Navigation menu</h4>
                <nav>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Categories</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Products</a></li>

                    </ul>
                </nav>
            </aside>

            <main class="col-md-9">
                <h1 class="mt-4 mb-4 h2">{{ $title }}</h1>

                @if (session()->has('success'))
                    <h6 class="alert alert-success">{{ session()->get('success') }}</h6>
                    {{ session()->forget('success') }}
                @endif

                @yield('content')
            </main>

        </div>

</body>

</html>
