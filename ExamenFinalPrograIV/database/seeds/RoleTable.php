<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "Admi";
        $role->description = "Administrador";
        $role->save();
        
        $role = new Role();
        $role->name = "User";
        $role->description = "Usuario Autenticado";
        $role->save();
    }
}
