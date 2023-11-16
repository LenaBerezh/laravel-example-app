<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>{{ $title ?? 'Joberest' }}</title>
    </head>
    <body class="container bg-white mx-auto max-w-5xl">
        <header class="bg-white">
          <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
              <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Joberest</span>
                <img class="h-20 w-auto" src="{{ Vite::asset('resources/images/logo.png') }}"  alt=""}}">
              </a>
            </div>
            <div class="lg:flex lg:flex-5 lg:gap-x-12 lg:justify-end">
              <a href="{{ route('jobs.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Jobs</a>
              <a href="{{ route('companies.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Companies</a>
            </div>
          </nav>
        </header>
        <section class="container text-gray-400">
            {{ $slot }}
        </section>
    </body>
</html>
