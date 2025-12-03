<x-admin-layout :breadcrumbs="[

   [
    'name' => 'Dashboards',
    'href' => route('admin.dashboard'),
   ],
   [
    'name' => 'usuarios',
    'href' => route('admin.user.index'),
   ],

    [ 'name' => 'Nuevo'],
]">

<x-wire-card title="Registrar Nuevo Usuario"> <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                
                <x-wire-input 
                    label="Nombre" 
                    name="name" 
                    placeholder="Nombre completo" 
                    value="{{ old('name') }}" 
                />

                
                <x-wire-input 
                    type="email"
                    label="Correo" 
                    name="email" 
                    placeholder="ejemplo@correo.com" 
                    value="{{ old('email') }}" 
                />

                <x-wire-input 
                    label="Teléfono" 
                    name="phone" 
                    placeholder="999..." 
                    value="{{ old('phone') }}" 
                />
                <x-wire-input 
                    label="Dirección" 
                    name="address" 
                    placeholder="Calle, Número, Colonia" 
                    value="{{ old('address') }}" 
                />

                <x-wire-input 
                    type="password" 
                    label="Contraseña" 
                    name="password" 
                    placeholder="********" 
                />
                 <x-wire-select 
                    type="select" 
                    label="Rol" 
                    name="role" 
                    placeholder="Escoge un rol para el usuario"
                    :options="$roles" 
                    option-label="name" 
                    option-value="name"
                />

                <div></div> 

            </div>
    
            <div class="flex justify-end mt-4">
                <x-wire-button type="submit" blue spinner="save">
                    Guardar
                </x-wire-button>
            </div>

        </form>
    </x-wire-card>

</x-admin-layout>