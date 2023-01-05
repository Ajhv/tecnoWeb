<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Menus
            'ver-modulo-usuarios',
            'ver-modulo-activos',
            'ver-modulo-mantenimientos',
            'ver-modulo-seguimientos',

            //Submenus de Mantenimiento
            'ver-submodulo-mantenimientos',

            //Operaciones sobre tabla usuario
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //Operaciones sobre tabla rol
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operaciones sobre tabla activo
            'ver-activo',
            'crear-activo',
            'editar-activo',
            'borrar-activo',

            //Operaciones sobre tabla ambiente
            'ver-ambiente',
            'crear-ambiente',
            'editar-ambiente',
            'borrar-ambiente',

            //Operaciones sobre tabla categoria
            'ver-categoria',
            'crear-categoria',
            'editar-categoria',
            'borrar-categoria',

            //Operaciones sobre tabla estado_activo
            'ver-estado_activo',
            'crear-estado_activo',
            'editar-estado_activo',
            'borrar-estado_activo',

            //Operaciones sobre tabla estado_mantenimiento
            'ver-estado_mantenimiento',
            'crear-estado_mantenimiento',
            'editar-estado_mantenimiento',
            'borrar-estado_mantenimiento',

            //Operaciones sobre tabla fotografia
            'ver-fotografia',
            'crear-fotografia',
            'editar-fotografia',
            'borrar-fotografia',

            //Operaciones sobre tabla mantenimiento
            'ver-mantenimiento',
            'crear-mantenimiento',
            'editar-mantenimiento',
            'borrar-mantenimiento',

            //Operaciones sobre tabla mapa
            'ver-mapa',
            'crear-mapa',
            'editar-mapa',
            'borrar-mapa',

            //Operaciones sobre tabla persona
            'ver-persona',
            'crear-persona',
            'editar-persona',
            'borrar-persona',

            //Operaciones sobre tabla resporte
            'ver-resporte',
            'crear-resporte',
            'editar-resporte',
            'borrar-resporte',

            //Operaciones sobre tabla salida_activo
            'ver-salida_activo',
            'crear-salida_activo',
            'editar-salida_activo',
            'borrar-salida_activo',

            //Operaciones sobre tabla tipo_ingreso
            'ver-tipo_ingreso',
            'crear-tipo_ingreso',
            'editar-tipo_ingreso',
            'borrar-tipo_ingreso',

            //Operaciones sobre tabla traspaso_activo
            'ver-traspaso_activo',
            'crear-traspaso_activo',
            'editar-traspaso_activo',
            'borrar-traspaso_activo',

            
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
