@props(['breadcrumbs' => []])
<!-- ***** Breadcrumb sección ***** -->


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

    <!--iconos-->
    <script src="https://kit.fontawesome.com/8c200d5981.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased" x-data="{ sidebarOpen: false }" :class="{
    'overflow-y-hidden': sidebarOpen
}">




    <!-- elmento donde se añade el fondo oscuro en  el menu
    'overflow-y-hidden': sidebarOpen para lo del scroll
    -->

    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 sm:hidden" style="display: none;" x-show="sidebarOpen"
        x-on:click="sidebarOpen = false">
    </div>


    @include('layouts.partials.admin.navigation')


    @include('layouts.partials.admin.sidebar')




    <div class="p-4 sm:ml-64">


        <!-- Breadcrumb -->


        <div class=" justify-between flex items-center mt-14 mb-4">
            @if (!empty($breadcrumbs))
                @include('layouts.partials.admin.breadcrumb', [
                    'breadcrumbs' => $breadcrumbs,
                    'title' => $breadcrumbs[array_key_last($breadcrumbs)]['name'] ?? null,
                ])
            @endif

            @isset($action)
                <div>
                    {{ $action }}
                </div>
            @endisset
        </div>

        
        {{-- @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">¡Éxito!</span> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">¡Error!</span> {{ session('error') }}
            </div>
        @endif --}}


        <!-- Contenido principal -->
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            {{ $slot }}
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts

    @stack('js')


    <!-- Mensajes de éxito y error -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif


</body>

</html>
