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
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla proyectos
            'ver-proy',
            'crear-proy',
            'editar-proy',
            'borrar-proy',

            //Operacions sobre tabla actividades
            'ver-act',
            'crear-act',
            'editar-act',
            'borrar-act',

            //Operacions sobre tabla categorias
            'ver-cat',
            'crear-cat',
            'editar-cat',
            'borrar-cat',

            //Operacions sobre tabla ubicacion
            'ver-ubi',
            'crear-ubi',
            'editar-ubi',
            'borrar-ubi',

            //Operacions sobre tabla presupuesto
            'ver-presu',
            'crear-presu',
            'editar-presu',
            'borrar-presu',

            //Operacions sobre tabla personal
            'ver-pers',
            'crear-pers',
            'editar-pers',
            'borrar-pers',
            
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
