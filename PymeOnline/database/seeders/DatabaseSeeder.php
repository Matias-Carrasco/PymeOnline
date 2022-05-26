<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this -> insertarRoles();
    }

    public function insertarRoles(): void
    {
        $now = now();
        $roles = [
            ['admin'],
            ['cliente'],
            ['tienda']
        ];

        $roles = array_map(function ($rol) use ($now){
            return[                
                'rol_nombre' => $rol[0]
            ];
        },$roles);

        DB::table('rols')->insert($roles);

    }
}
