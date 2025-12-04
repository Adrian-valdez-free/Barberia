<x-admin-layout :breadcrumbs="[

   [
    'name' => 'Dashboards',
    'href' => route('admin.dashboard'),
   ],
   [
    'name' => 'Servicios',
    'href' => route('admin.services.index'),
   ],

    [ 'name' => 'Editar'],
]">

<x-wire-card title="Registrar nuevo servicio"> <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                
                <x-wire-input 
                    label="Nombre" 
                    name="name" 
                    placeholder="Nombre del servicio" 
                    value="{{ old('name', $service->name) }}" 
                />

                <x-wire-input 
                    label="Precio" 
                    name="price" 
                    placeholder="$$$" 
                    value="{{ old('price', $service->price) }}" 
                />
                <x-wire-input 
                    label="Duracion" 
                    name="duration_minutes" 
                    placeholder="Minutos" 
                    value="{{ old('duration_minutes', $service->duration_minutes) }}" 
                />
                <div x-data="{ status: {{ $service->is_active ? 1 : 0 }} }">
                 <x-wire-select 
                    label="Disponible"
                    placeholder="¿Está disponible?"
                    name="is_active"
                    
                    {{-- Opciones con ID numérico --}}
                    :options="[
                        ['name' => 'Sí', 'id' => 1],
                        ['name' => 'No', 'id' => 0]
                    ]"
                    
                    option-label="name"
                    option-value="id"
                    
                    {{-- 2. Conectamos DIRECTAMENTE al cerebro de JS --}}
                    x-model="status"
                                />
                    </div>
                     <x-wire-input 
                    label="Descripcion" 
                    name="description" 
                    placeholder="Este servicio consta de..." 
                    value="{{ old('description', $service->description) }}" 
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