@props([
    'title' => config('app.name', 'laravel'), // <-- Aquí faltaba la coma
    'breadcrumbs' => []
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

         <!-- Fontawesome -->


        <script src="https://kit.fontawesome.com/85420b1c77.js" crossorigin="anonymous"></script>

         <!-- Sweetalert2 -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <wireui:scripts />


        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">


 @include('layouts.includes.staff.navigation')
 @include('layouts.includes.staff.sidebar') 
        
<div class="p-4 sm:ml-64 pt-5">
      <div class = "mt-14 flex items-center justify-between w-full">
        @include('layouts.includes.staff.breadcrumb')

     @if (isset($action))
    <div>
    {{ $action }}
    </div>
    @endif
    </div>
 {{$slot}}

</div>
</div>

        @stack('modals')

        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        @if (@session('swal'))
        <script>
                        Swal.fire(@json(session('swal')));
;
        </script>
    @endif
    <script>
        //vas a buscar todos los elemento de una clase especifica
        forms = document.querySelectorAll('.delete-form')
        forms.forEach(form => {
            //Se pone al pendiente de cualquier accion submit o modo chismosa xddxxxdddx
            form.addEventListener('submit', function(e){
                //evite que se envie 
                e.preventDefault();
                Swal.fire({
  title: "¿Estas seguro?",
  text: "No podras revertir lo siguiente",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, eliminalo!",
  cancelButtonText: "Cancelar"

}).then((result) => {
    if (result.isConfirmed){
    form.submit();
    }
});
            })
        });
    </script>

    </body>
</html>
