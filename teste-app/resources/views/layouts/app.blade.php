<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
document.addEventListener('DOMContentLoaded', function() {
  var cnpjInputs = document.querySelectorAll('.cnpj-input');

  cnpjInputs.forEach(function(input) {
    input.addEventListener('input', function() {
      var value = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
      var formattedValue = formatCnpj(value);
      this.value = formattedValue;
    });
  });
});

function formatCnpj(value) {
  var formattedValue = '';
  var cnpjRegex = /^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/;

  if (cnpjRegex.test(value)) {
    formattedValue = value.replace(cnpjRegex, '$1.$2.$3/$4-$5');
  } else {
    formattedValue = value.slice(0, 14);
  }

  return formattedValue;
}


        </script>
    </body>
</html>
