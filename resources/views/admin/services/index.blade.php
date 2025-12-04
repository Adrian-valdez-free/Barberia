<x-admin-layout :breadcrumbs="[

   [
    'name' => 'Dashboards',
    'href' => route('admin.dashboard'),
   ],

    [ 'name' => 'Servicios'],
]">
     <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.services.create') }}">
        <i class ="fa-solid fa-plus"></i>
        Nuevo
        </x-wire-button>
     </x-slot>
     
    @livewire('admin.datatables.service-table')

</x-admin-layout>