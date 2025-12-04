<x-staff-layout :breadcrumbs="[

   [
    'name' => 'Dashboards',
    'href' => route('staff.dashboard'),
   ],
   [
    'name' => 'Servicios',
    'href' => route('staff.services.index'),
   ],

    [ 'name' => 'Nuevo'],
]">

<x-wire-card title="Registrar nuevo servicio"> <form action="{{ route('staff.services.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                
                <x-wire-input 
                    label="Nombre" 
                    name="name" 
                    placeholder="Nombre del servicio" 
                    value="{{ old('name') }}" 
                />

                <x-wire-input 
                    label="Precio" 
                    name="price" 
                    placeholder="$$$" 
                    value="{{ old('price') }}" 
                />
                <x-wire-input 
                    label="Duracion" 
                    name="duration_minutes" 
                    placeholder="Minutos" 
                    value="{{ old('address') }}" 
                />

                 <x-wire-select 
                    type="select" 
                    label="Disponible" 
                    name="is_active" 
                    placeholder="Esta disponible"
                    {{-- 1. Definimos las opciones manualmente aquí --}}
                    :options="[
                     ['name' => 'Sí',  'id' => 1],
                     ['name' => 'No',  'id' => 0]
                            ]"
    
                    {{-- 2. Le decimos qué claves usar del array de arriba --}}
                    option-label="name" 
                    option-value="id"

                                />
                     <x-wire-input 
                    label="Descripcion" 
                    name="description" 
                    placeholder="Este servicio consta de..." 
                    value="{{ old('description') }}" 
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

</x-staff-layout>