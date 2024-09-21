<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>SIREN: Strategic Intelligence Resources & Execution Network </title>

    <!-- Import CSS from node_modules -->
    <link rel="stylesheet" href="{{ asset('css/jsvectormap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">

    @vite(['resources/js/app.ts', 'resources/js/assets/css/style.css'])
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>