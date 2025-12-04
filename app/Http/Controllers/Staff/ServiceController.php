<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('staff.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:services,name',
            'description' => 'required|:services,description',
            'price' => 'required|:services,price',
            'duration_minutes' => 'required|:services,duration_minutes',
            'is_active' => 'required|:services,is_active',
    ]);
    Service::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'duration_minutes' => $request->duration_minutes,
        'is_active' => $request->is_active,
    ]);

    session()->flash('swal',
        [
            'icon' => 'success',
            'title' => 'Servicio se ha creado correctamente',
            'text' => 'El Servicio se ha creado exitosamente',
        ]);
        
    return redirect()->route('staff.services.index')->with('success', 'User created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('staff.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|:services,name',
            'description' => 'required|:services,description',
            'price' => 'required|:services,price',
            'duration_minutes' => 'required|:services,duration_minutes',
            'is_active' => 'required|:services,is_active',
    ]);

    $service->fill([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'price' => $validated['price'],
        'duration_minutes' => $validated['duration_minutes'],
        'is_active' => $validated['is_active'],
    ]);
    if($service->isDirty()){
        $service->save();
        return redirect()->route('staff.services.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => '¡Actualizado!',
                'text' => 'El servicio se actualizó correctamente.'
            ]);
    }
    return redirect()->route('staff.services.index')
        ->with('swal', [
            'icon' => 'info',
            'title' => 'Sin cambios',
            'text' => 'No se detectaron modificaciones'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
         $service->delete();
        //Variable de alerta
          session()->flash('swal',
        [
            'icon' => 'success',
            'title' => 'Eliminado',
            'text' => 'El servicio ha sido eliminado exitosamente',
        ]);
        return view('admin.services.index');
    }
}
