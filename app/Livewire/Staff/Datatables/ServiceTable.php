<?php

namespace App\Livewire\Staff\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Service;

class ServiceTable extends DataTableComponent
{
    protected $model = Service::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
      return [
            Column::make("Id", "id")
                ->sortable(),
                
            Column::make("Name", "name")
                ->sortable()
                ->searchable(), // Te recomiendo agregar searchable aquí
                
            Column::make("Descripcion", "description")
                ->sortable(),
                
            Column::make("Precio", "price")
                ->sortable()
                ->format(fn($value) => '$' . number_format($value, 2)), // Tip: Formato de moneda
                
            Column::make("Duracion", "duration_minutes")
                ->sortable()
                ->format(fn($value) => $value . ' min'), // Tip: Agregar unidad
                
            // AQUI ESTA TU CAMBIO
            Column::make("Disponible", "is_active")
    ->sortable()
    ->format(function($value) {
        if ($value) {
            return '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        Sí
                    </span>';
        }
        
        return '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    No
                </span>';
    })
    ->html(),

            Column::make("Acciones")
                ->label(function($row){
                    return view('staff.services.actions', ['service' => $row]);  
                }) 
        ];
    }
}
