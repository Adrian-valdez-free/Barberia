<x-admin-layout :breadcrumbs="[

   [
    'name' => 'Dashboards',
    'href' => route('admin.dashboard'),
   ],

    [ 'name' => 'Usuarios'],
]">
     <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.user.create') }}">
        <i class ="fa-solid fa-plus"></i>
        Nuevo
        </x-wire-button>
     </x-slot>
     
    @livewire('admin.datatables.user-table')

</x-admin-layout>