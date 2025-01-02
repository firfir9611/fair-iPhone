<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{  asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{  asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{  asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{  asset('favicon_io/site.webmanifest') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>{{ $slot }}</title>
</head>
