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
                var cnpjElements = document.querySelectorAll('.cnpj-input');
        
                cnpjElements.forEach(function(element) {
                    var isInput = element.tagName === 'INPUT';
        
                    element.addEventListener('input', function() {
                        var value = isInput ? this.value.replace(/\D/g, '') : this.innerText.replace(/\D/g, '');
                        var maxLength = 14; // Número máximo de dígitos do CNPJ
        
                        if (value.length > maxLength) {
                            value = value.slice(0, maxLength);
                        }
        
                        var formattedValue = formatCnpj(value);
        
                        if (isInput) {
                            this.value = formattedValue;
                        } else {
                            this.innerText = formattedValue;
                        }
                    });
        
                    // Formatação automática do CNPJ
                    var value = isInput ? element.value.replace(/\D/g, '') : element.innerText.replace(/\D/g, '');
                    var formattedValue = formatCnpj(value);
        
                    if (isInput) {
                        element.value = formattedValue;
                    } else {
                        element.innerText = formattedValue;
                    }
                });
            });
        
            function formatCnpj(value) {
                var formattedValue = '';
                var cnpjRegex = /^(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})$/;
        
                formattedValue = value.replace(cnpjRegex, function(match, g1, g2, g3, g4, g5) {
                    var result = '';
                    if (g1) {
                        result += g1;
                        if (g1.length === 2) {
                            result += '.';
                        }
                    }
                    if (g2) {
                        result += g2;
                        if (g2.length === 3) {
                            result += '.';
                        }
                    }
                    if (g3) {
                        result += g3;
                        if (g3.length === 3) {
                            result += '/';
                        }
                    }
                    if (g4) {
                        result += g4;
                        if (g4.length === 4) {
                            result += '-';
                        }
                    }
                    if (g5) {
                        result += g5;
                    }
                    return result;
                });
        
                return formattedValue;
            }
        </script>
        
        
    </body>
</html>
