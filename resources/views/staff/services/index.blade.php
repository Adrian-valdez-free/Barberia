<x-staff-layout :breadcrumbs="[

   [
    'name' => 'Dashboards',
    'href' => route('staff.dashboard'),
   ],

    [ 'name' => 'Servicios'],
]">
     <x-slot name="action">
        <x-wire-button blue href="{{ route('staff.services.create') }}">
        <i class ="fa-solid fa-plus"></i>
        Nuevo
        </x-wire-button>
     </x-slot>
     
    @livewire('staff.datatables.service-table')

</x-staff-layout>