<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <title>{{ config("app.name", "Laravel") }}</title>
  </head>
  <body class="bg-slate-950">
    @if (! Request::is("auth/*"))
      @include("partials.navbar")
    @endif

    <main id="app" class="min-h-screen">
      @yield("content")
    </main>

    @if (! Request::is("auth/*"))
      @include("partials.footer")
    @endif
  </body>
</html>
