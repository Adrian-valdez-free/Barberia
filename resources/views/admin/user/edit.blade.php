<x-admin-layout :breadcrumbs="[

   [
    'name' => 'Dashboards',
    'href' => route('admin.dashboard'),
   ],
   [
    'name' => 'usuarios',
    'href' => route('admin.user.index'),
   ],

    [ 'name' => 'Editar'],
]">

<x-wire-card title="Editar Usuario"> 
  <form action="{{ route('admin.user.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
        

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                
                <x-wire-input 
                    label="Nombre" 
                    name="name" 
                    placeholder="Nombre completo" 
                    value="{{ old('name', $user->name) }}"
                />

                <x-wire-input 
                    type="email"
                    label="Correo" 
                    name="email" 
                    placeholder="ejemplo@correo.com" 
                    value="{{ old('email', $user->email) }}" 
                />

                <x-wire-input 
                    label="Teléfono" 
                    name="phone" 
                    placeholder="999..." 
                    value="{{ old('phone', $user->phone) }}"
                />
                <x-wire-input 
                    label="Dirección" 
                    name="address" 
                    placeholder="Calle, Número, Colonia" 
                    value="{{ old('address', $user->address)}}" 
                />
                
       <div x-data="{ role: {{ $user->roles->first()->id ?? 'null' }} }">
   <x-wire-select
    label="Rol del Usuario"
        placeholder="Selecciona un rol"
        :options="$roles"
        option-label="name"
        option-value="id"
        name="role"
        x-model="role"  {{-- 2. Conectamos el select a la variable de Alpine --}}
/>

</div>
            </div>
    
            <div class="flex justify-end mt-4">
                <x-wire-button type="submit" blue spinner="save">
                    Guardar
                </x-wire-button>
            </div>

        </form>
    </x-wire-card>

</x-admin-layout>