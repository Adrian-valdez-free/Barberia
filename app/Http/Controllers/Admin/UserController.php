<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|:users,name',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'address' => 'required|:users,address',
            'password' => 'required|:users,password',
            'role' => 'required|exists:roles,name'
    ]);
    do{
        $idNumber = random_int(1000000000, 9999999999);
    }while (\App\Models\User::where('id_number', $idNumber)->exists());

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'password' =>bcrypt($request->password),
        'id_number' => $idNumber
    ])->assignRole($request->role);
    
         session()->flash('swal',
        [
            'icon' => 'success',
            'title' => 'Usuario se ha creado correctamente',
            'text' => 'El usuario se ha exitosamente',
        ]);
        
    return redirect()->route('admin.user.index')->with('success', 'User created succesfully');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        
        // 1. Validación
    $validated = $request->validate([
        'name' => 'required|:users,name',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'required|numeric|digits:10|unique:users,phone,' . $user->id,
        'address' => 'required|:users,address',
        'role' => 'required|exists:roles,id',
    ]);

    // 2. Cargar datos en memoria (sin guardar)
    $user->fill([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
    ]);

    // 3. Verificar cambios de Rol
    $currentRoleId = $user->roles->first()?->id;
    $newRoleId = (int) $validated['role'];
    $roleChanged = $currentRoleId !== $newRoleId;

    // 4. Lógica de decisión
    if ($user->isDirty() || $roleChanged) {
        
        // Si hay cambios, guardamos
        if ($user->isDirty()) $user->save();
        if ($roleChanged) $user->syncRoles([$newRoleId]);

        // Retorno con mensaje de ÉXITO
        return redirect()->route('admin.user.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => '¡Actualizado!',
                'text' => 'El usuario se actualizó correctamente.'
            ]);
    }

    // 5. Si NO hubo cambios (Else implícito)
    return redirect()->route('admin.user.index')
        ->with('swal', [
            'icon' => 'info',
            'title' => 'Sin cambios',
            'text' => 'No se detectaron modificaciones'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id <=3){
             session()->flash('swal',
        [
            'icon' => 'error',
            'title' => 'Error',
            'text' => 'No puedes eliminar este usuario',
        ]);
          return redirect()->route('admin.user.index');
        }
        $user->delete();
        //Variable de alerta
          session()->flash('swal',
        [
            'icon' => 'success',
            'title' => 'Usuario eliminado correctamente',
            'text' => 'El usuario ha sido eliminado exitosamente',
        ]);
          return redirect()->route('admin.user.index');
    }
}