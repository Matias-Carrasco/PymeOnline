<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $this->insertarRoles();
        $this->insertarRegiones();
        $this->insertarComunas();
        
        //Usuarios de pruebas
        $this->insertarAdminTest();
        $this->insertarTiendaTest();

        $this->insertarUsuarios( $faker, 100);
        $this->insertarDireccions( $faker , 500 );
        $this->insertarInvitados( $faker , 100 );
        $this->insertarClientes( $faker );
        $this->insertarTiendaEstilos( $faker , 40 );
        $this->insertarTiendas( $faker );
        $this->insertarCompras( $faker , 100 );
        $this->insertarProductos( $faker , 10);
        $this->insertarTags( $faker , 10 );
        $this->insertarCategorias($faker, 3);
        $this->insertarPublicacions($faker);
        $this->insertarResenas($faker);
        $this->insertarPreguntas($faker);
        $this->insertarRespuestas($faker);
        $this->insertarClienteDireccions($faker);
        $this->insertarTagsPublicaciones($faker);
        $this->insertarLineaCompras($faker);
        
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

    public function insertarRegiones(): void
    {
        $now = now();
        $regions = [
            ['Arica y Parinacota'],
            ['Tarapacá'],
            ['Antofagasta'],
            ['Atacama'],
            ['Coquimbo'],
            ['Valparaiso'],
            ['Metropolitana de Santiago'],
            ['Libertador General Bernardo O\'higgins'],
            ['Maule'],
            ['Ñuble'],
            ['Biobio'],
            ['La Araucania'],
            ['Los Rios'],
            ['Los Lagos'],
            ['Aisén del General Carlos Ibáñes del Campo'],
            ['Magallanes y de la Antártica Chilena'],
        ];
        $regions = array_map(function ($region) use ($now){
            return[                
                'region_nombre' => $region[0],
            ];
            
        }, $regions);

        DB::table('regions')->insert($regions);

    }

    public function insertarComunas(): void
    {
        $now = now();
        $comunas = [
            ['Arica', 1],
            ['Camarones', 1],
            ['General Lagos', 1],
            ['Putre', 1],
            ['Alto Hospicio', 2],
            ['Iquique', 2],
            ['Camiña', 2],
            ['Colchane', 2],
            ['Huara', 2],
            ['Pica', 2],
            ['Pozo Almonte', 2],
            ['Antofagasta', 3],
            ['Mejillones', 3],
            ['Sierra Gorda', 3],
            ['Taltal', 3],
            ['Calama', 3],
            ['Ollague', 3],
            ['San Pedro de Atacama', 3],
            ['María Elena', 3],
            ['Tocopilla', 3],
            ['Chañaral', 4],
            ['Diego de Almagro', 4],
            ['Caldera', 4],
            ['Copiapó', 4],
            ['Tierra Amarilla', 4],
            ['Alto del Carmen', 4],
            ['Freirina', 4],
            ['Huasco', 4],
            ['Vallenar', 4],
            ['Canela', 5],
            ['Illapel', 5],
            ['Los Vilos', 5],
            ['Salamanca', 5],
            ['Andacollo', 5],
            ['Coquimbo', 5],
            ['La Higuera', 5],
            ['La Serena', 5],
            ['Paihuaco', 5],
            ['Vicuña', 5],
            ['Combarbalá', 5],
            ['Monte Patria', 5],
            ['Ovalle', 5],
            ['Punitaqui', 5],
            ['Río Hurtado', 5],
            ['Isla de Pascua', 6],
            ['Calle Larga', 6],
            ['Los Andes', 6],
            ['Rinconada', 6],
            ['San Esteban', 6],
            ['La Ligua', 6],
            ['Papudo', 6],
            ['Petorca', 6],
            ['Zapallar', 6],
            ['Hijuelas', 6],
            ['La Calera', 6],
            ['La Cruz', 6],
            ['Limache', 6],
            ['Nogales', 6],
            ['Olmué', 6],
            ['Quillota', 6],
            ['Algarrobo', 6],
            ['Cartagena', 6],
            ['El Quisco', 6],
            ['El Tabo', 6],
            ['San Antonio', 6],
            ['Santo Domingo', 6],
            ['Catemu', 6],
            ['Llaillay', 6],
            ['Panquehue', 6],
            ['Putaendo', 6],
            ['San Felipe', 6],
            ['Santa María', 6],
            ['Casablanca', 6],
            ['Concón', 6],
            ['Juan Fernández', 6],
            ['Puchuncaví', 6],
            ['Quilpué', 6],
            ['Quintero', 6],
            ['Valparaíso', 6],
            ['Villa Alemana', 6],
            ['Viña del Mar', 6],
            ['Colina', 7],
            ['Lampa', 7],
            ['Tiltil', 7],
            ['Pirque', 7],
            ['Puente Alto', 7],
            ['San José de Maipo', 7],
            ['Buin', 7],
            ['Calera de Tango', 7],
            ['Paine', 7],
            ['San Bernardo', 7],
            ['Alhué', 7],
            ['Curacaví', 7],
            ['María Pinto', 7],
            ['Melipilla', 7],
            ['San Pedro', 7],
            ['Cerrillos', 7],
            ['Cerro Navia', 7],
            ['Conchalí', 7],
            ['El Bosque', 7],
            ['Estación Central', 7],
            ['Huechuraba', 7],
            ['Independencia', 7],
            ['La Cisterna', 7],
            ['La Granja', 7],
            ['La Florida', 7],
            ['La Pintana', 7],
            ['La Reina', 7],
            ['Las Condes', 7],
            ['Lo Barnechea', 7],
            ['Lo Espejo', 7],
            ['Lo Prado', 7],
            ['Macul', 7],
            ['Maipú', 7],
            ['Ñuñoa', 7],
            ['Pedro Aguirre Cerda', 7],
            ['Peñalolén', 7],
            ['Providencia', 7],
            ['Pudahuel', 7],
            ['Quilicura', 7],
            ['Quinta Normal', 7],
            ['Recoleta', 7],
            ['Renca', 7],
            ['San Miguel', 7],
            ['San Joaquín', 7],
            ['San Ramón', 7],
            ['Santiago', 7],
            ['Vitacura', 7],
            ['El Monte', 7],
            ['Isla de Maipo', 7],
            ['Padre Hurtado', 7],
            ['Peñaflor', 7],
            ['Talagante', 7],
            ['Codegua', 8],
            ['Coínco', 8],
            ['Coltauco', 8],
            ['Doñihue', 8],
            ['Graneros', 8],
            ['Las Cabras', 8],
            ['Machalí', 8],
            ['Malloa', 8],
            ['Most﻿azal', 8],
            ['Olivar', 8],
            ['Peumo', 8],
            ['Pichidegua', 8],
            ['Quinta de Tilcoco', 8],
            ['Rancagua', 8],
            ['Rengo', 8],
            ['Requínoa', 8],
            ['San Vicente de Tagua Tagua', 8],
            ['La Estrella', 8],
            ['Litueche', 8],
            ['Marchihue', 8],
            ['Navidad', 8],
            ['Peredones', 8],
            ['Pichilemu', 8],
            ['Chépica', 8],
            ['Chimbarongo', 8],
            ['Lolol', 8],
            ['Nancagua', 8],
            ['Palmilla', 8],
            ['Peralillo', 8],
            ['Placilla', 8],
            ['Pumanque', 8],
            ['San Fernando', 8],
            ['Santa Cruz', 8],
            ['Cauquenes', 9],
            ['Chanco', 9],
            ['Pelluhue', 9],
            ['Curicó', 9],
            ['Hualañé', 9],
            ['Licantén', 9],
            ['Molina', 9],
            ['Rauco', 9],
            ['Romeral', 9],
            ['Sagrada Familia', 9],
            ['Teno', 9],
            ['Vichuquén', 9],
            ['Colbún', 9],
            ['Linares', 9],
            ['Longaví', 9],
            ['Parral', 9],
            ['Retiro', 9],
            ['San Javier', 9],
            ['Villa Alegre', 9],
            ['Yerbas Buenas', 9],
            ['Constitución', 9],
            ['Curepto', 9],
            ['Empedrado', 9],
            ['Maule', 9],
            ['Pelarco', 9],
            ['Pencahue', 9],
            ['Río Claro', 9],
            ['San Clemente', 9],
            ['San Rafael', 9],
            ['Talca', 9],
            ['Bulnes', 10],
            ['Chillán', 10],
            ['Chillán Viejo', 10],
            ['Cobquecura', 10],
            ['Coelemu', 10],
            ['Coihueco', 10],
            ['El Carmen', 10],
            ['Ninhue', 10],
            ['Ñiquen', 10],
            ['Pemuco', 10],
            ['Pinto', 10],
            ['Portezuelo', 10],
            ['Quirihue', 10],
            ['Ránquil', 10],
            ['Treguaco', 10],
            ['Quillón', 10],
            ['San Carlos', 10],
            ['San Fabián', 10],
            ['San Ignacio', 10],
            ['San Nicolás', 10],
            ['Yungay', 10],
            ['Arauco', 11],
            ['Cañete', 11],
            ['Contulmo', 11],
            ['Curanilahue', 11],
            ['Lebu', 11],
            ['Los Álamos', 11],
            ['Tirúa', 11],
            ['Alto Biobío', 11],
            ['Antuco', 11],
            ['Cabrero', 11],
            ['Laja', 11],
            ['Los Ángeles', 11],
            ['Mulchén', 11],
            ['Nacimiento', 11],
            ['Negrete', 11],
            ['Quilaco', 11],
            ['Quilleco', 11],
            ['San Rosendo', 11],
            ['Santa Bárbara', 11],
            ['Tucapel', 11],
            ['Yumbel', 11],
            ['Chiguayante', 11],
            ['Concepción', 11],
            ['Coronel', 11],
            ['Florida', 11],
            ['Hualpén', 11],
            ['Hualqui', 11],
            ['Lota', 11],
            ['Penco', 11],
            ['San Pedro de La Paz', 11],
            ['Santa Juana', 11],
            ['Talcahuano', 11],
            ['Tomé', 11],
            ['Carahue', 12],
            ['Cholchol', 12],
            ['Cunco', 12],
            ['Curarrehue', 12],
            ['Freire', 12],
            ['Galvarino', 12],
            ['Gorbea', 12],
            ['Lautaro', 12],
            ['Loncoche', 12],
            ['Melipeuco', 12],
            ['Nueva Imperial', 12],
            ['Padre Las Casas', 12],
            ['Perquenco', 12],
            ['Pitrufquén', 12],
            ['Pucón', 12],
            ['Saavedra', 12],
            ['Temuco', 12],
            ['Teodoro Schmidt', 12],
            ['Toltén', 12],
            ['Vilcún', 12],
            ['Villarrica', 12],
            ['Angol', 12],
            ['Collipulli', 12],
            ['Curacautín', 12],
            ['Ercilla', 12],
            ['Lonquimay', 12],
            ['Los Sauces', 12],
            ['Lumaco', 12],
            ['Purén', 12],
            ['Renaico', 12],
            ['Traiguén', 12],
            ['Victoria', 12],
            ['Corral', 13],
            ['Lanco', 13],
            ['Los Lagos', 13],
            ['Máfil', 13],
            ['Mariquina', 13],
            ['Paillaco', 13],
            ['Panguipulli', 13],
            ['Valdivia', 13],
            ['Futrono', 13],
            ['La Unión', 13],
            ['Lago Ranco', 13],
            ['Río Bueno', 13],
            ['Ancud', 14],
            ['Castro', 14],
            ['Chonchi', 14],
            ['Curaco de Vélez', 14],
            ['Dalcahue', 14],
            ['Puqueldón', 14],
            ['Queilén', 14],
            ['Quemchi', 14],
            ['Quellón', 14],
            ['Quinchao', 14],
            ['Calbuco', 14],
            ['Cochamó', 14],
            ['Fresia', 14],
            ['Frutillar', 14],
            ['Llanquihue', 14],
            ['Los Muermos', 14],
            ['Maullín', 14],
            ['Puerto Montt', 14],
            ['Puerto Varas', 14],
            ['Osorno', 14],
            ['Puero Octay', 14],
            ['Purranque', 14],
            ['Puyehue', 14],
            ['Río Negro', 14],
            ['San Juan de la Costa', 14],
            ['San Pablo', 14],
            ['Chaitén', 14],
            ['Futaleufú', 14],
            ['Hualaihué', 14],
            ['Palena', 14],
            ['Aisén', 15],
            ['Cisnes', 15],
            ['Guaitecas', 15],
            ['Cochrane', 15],
            ['O\'higgins', 15],
            ['Tortel', 15],
            ['Coihaique', 15],
            ['Lago Verde', 15],
            ['Chile Chico', 15],
            ['Río Ibáñez', 15],
            ['Antártica', 16],
            ['Cabo de Hornos', 16],
            ['Laguna Blanca', 16],
            ['Punta Arenas', 16],
            ['Río Verde', 16],
            ['San Gregorio', 16],
            ['Porvenir', 16],
            ['Primavera', 16],
            ['Timaukel', 16],
            ['Natales', 16],
            ['Torres del Paine', 16],
            ['Cabildo', 6],
        ];

        $comunas = array_map(function($comuna) use ($now){
            return[
                'region_id' => $comuna[1],
                'comuna_nombre' => $comuna[0],
            ];
        },$comunas);

        DB::table('comunas')->insert($comunas);

    }

    public function insertarUsuarios( $faker , $numero )
    {    
        if ($numero < 1) return false;

        foreach (range(1,$numero) as $index) {
            
            

            DB::table('users')->insert([
                'rol_id' => random_int(2,3),
                'email' => $faker->unique()->email() ,
                'email_verified_at' => now() ,
                'password' => $faker->password() ,
                'baneado' => false ,
                'created_at' => now() ,
                'updated_at' => now()
            ]);
        }

        return true;
    }
    

    public function insertarAdminTest()
    {    
        DB::table('users')->insert([
            'rol_id' => 1 ,
            'email' => 'admin@admin.com',
            'email_verified_at' => now() ,
            'password' => Hash::make('adminadmin'),
            'baneado' => false ,
            'created_at' => now() ,
            'updated_at' => now()
        ]);
        return true;
    }

    public function insertarTiendaTest()
    {    
        DB::table('users')->insert([
            'rol_id' => 3 ,
            'email' => 'tienda@tienda.com',
            'email_verified_at' => now() ,
            'password' => Hash::make('tiendatienda'),
            'baneado' => false ,
            'created_at' => now() ,
            'updated_at' => now()
        ]);
        return true;
    }

    public function insertarDireccions( $faker , $numero )
    {

        if ($numero < 1) return false;

        $ID_comunas = DB::table('comunas')->pluck('comuna_id');
     
        foreach (range(1,$numero) as $index) {
            DB::table('direccions')->insert([
                'comuna_id' => $faker->randomElement($ID_comunas),
                'direccion_nombre' => $faker->word(),
                'direccion_calle' =>  $faker->streetName(),
                'direccion_numero' =>  $faker->buildingNumber(),
                'direccion_detalles' => $faker->sentence()
            ]);
        }

        return true;
    }

    public function insertarInvitados( $faker , $numero )
    {

        if ($numero < 1) return false;

        $ID_Direcciones = DB::table('direccions')->pluck('direccion_id');
     
        foreach (range(1,$numero) as $index) {
            DB::table('invitados')->insert([
                'direccion_id' => $faker->randomElement($ID_Direcciones),
                'invitado_rut' => $faker->unique()->randomNumber(9, true),
                'invitado_nombre' =>  $faker->firstName(),
                'invitado_apellido' =>  $faker->lastName()
            ]);
        }

        return true;
    }

    public function insertarClientes( $faker )
    {

        $ID_Usuarios = DB::table('users')->where('rol_id','2')->pluck('id');

        foreach ($ID_Usuarios as $usuario_id) {
            DB::table('clientes')->insert([
                'id' => $usuario_id,
                'cliente_rut' => $faker->unique()->randomNumber(9, true),
                'cliente_nombre' =>  $faker->firstName(),
                'cliente_apellido' =>  $faker->lastName()
            ]);
        }

        return true;
    }

    public function insertarTiendaEstilos( $faker , $numero )
    {

        if ($numero < 1) return false;
     
        foreach (range(1,$numero) as $index) {
            DB::table('tienda_estilos')->insert([
                'tienda_banner_url' => $faker->url(),
                'tienda_color_principal_hex' => ltrim($faker->hexColor(),'#'),
                'tienda_color_secundario_hex' =>  ltrim($faker->hexColor(),'#')
            ]);
        }

        return true;
    }

    public function insertarTiendas( $faker )
    {

        $ID_Estilos = DB::table('tienda_estilos')->pluck('estilo_id');
        $ID_Usuarios = DB::table('users')->where('rol_id','3')->pluck('id');
        $ID_Direcciones = DB::table('direccions')->pluck('direccion_id');
     
        foreach ($ID_Usuarios as $usuario_id) {
            DB::table('tiendas')->insert([
                'estilo_id' => $faker->randomElement($ID_Estilos),
                'id' => $usuario_id,
                'direccion_id' => $faker->randomElement($ID_Direcciones),
                'tienda_rut_responsable' => $faker->unique()->randomNumber(9, true),
                'tienda_nombre_responsable' =>  $faker->firstName(),
                'tienda_primer_apellido_responsable' =>  $faker->lastName(),
                'tienda_segundo_apellido_responsable' =>  $faker->lastName(),
                'tienda_nombre' =>  $faker->unique()->company(),
                'tienda_numero_contacto' =>  $faker->phoneNumber(),
                'tienda_mail_contacto' =>  $faker->unique()->email(),
            ]);
        }

        return true;
    }

    public function insertarCompras( $faker , $numero )
    {
        if ($numero < 1) return false;

        $ID_Estilos = DB::table('tienda_estilos')->pluck('estilo_id');
        $ID_Clientes = DB::table('clientes')->pluck('cliente_id');
        $ID_Invitados = DB::table('invitados')->pluck('invitado_id');
     
        foreach (range(1,$numero) as $index) {
            DB::table('compras')->insert([
                'tienda_id' => $faker->randomElement($ID_Estilos),
                'cliente_id' => $faker->randomElement($ID_Clientes),
                'invitado_id' => $faker->randomElement($ID_Invitados),
                'compra_precio' => $faker->numberBetween(1, 999999),
                'compra_fecha' =>  $faker->dateTimeBetween('-1 year','now')
            ]);
        }

        return true;
    }

    public function insertarProductos( $faker , $numero )
    {
        if ($numero < 1) return false;
     
        $ID_Tiendas = DB::table('tiendas')->pluck('tienda_id');
        foreach($ID_Tiendas as $tienda_id){
            foreach (range(1,$numero) as $index) {
                DB::table('productos')->insert([
                    'tienda_id' => $tienda_id,
                    'producto_nombre' => $faker->word(),
                    'producto_descripcion' => $faker->sentence()
                ]);
            }
        }
        
        return true;
    }

    public function insertarTags( $faker , $numeroPorTienda )
    {
        if ($numeroPorTienda < 1) return false;
     
        $ID_Tiendas = DB::table('tiendas')->pluck('tienda_id');

        foreach ($ID_Tiendas as $tienda_id) {
            foreach (range(1,$numeroPorTienda) as $index) {
                DB::table('tags')->insert([
                    'tienda_id' => $tienda_id,
                    'tag_nombre' => $faker->word(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return true;
    }





    public function insertarCategorias($faker,$numeroPorTienda){
        if ($numeroPorTienda < 1) return false;
     
        $ID_Tiendas = DB::table('tiendas')->pluck('tienda_id');

        foreach ($ID_Tiendas as $tienda_id) {
            foreach (range(1,$numeroPorTienda) as $index) {
                DB::table('categorias')->insert([
                    'categoria_id_padre' => NULL,
                    'categoria_nombre' => $faker->word(),
                ]);
            }
        }

    }


    public function insertarPublicacions($faker)
    {
        $ID_Tiendas = DB::table('tiendas')->pluck('tienda_id');
        foreach ($ID_Tiendas as $tienda_id) {
            
            $ID_Productos = DB::table('productos')->where('tienda_id',$tienda_id)->pluck('producto_id');
            //$ID_Categorias = DB::table('categorias')->where('tienda_id',$tienda_id)->pluck('categoria_id');
            $ID_Categorias = DB::table('categorias')->pluck('categoria_id');
            foreach($ID_Productos as $producto_id) {
                DB::table('publicacions')->insert([
                    'tienda_id' => $tienda_id,
                    'producto_id' => $producto_id,
                    'categoria_id' => $faker->randomElement($ID_Categorias),
                    'pulicacion_activo' => rand(0,1),
                    'publicacion_titulo' => $faker->word(),
                    'publicacion_precio' => rand(20000,50000),
                    'publicacion_oferta_porcentual' => rand(0,50),
                ]);
            }
        }


        return true;
    }

   

    public function  insertarResenas($faker){
       
        $ID_Publicaciones = DB::table('publicacions')->pluck('publicacion_id');
        foreach($ID_Publicaciones as $publicacion_id) {
            DB::table('resenas')->insert([
                'publicacion_id' => $publicacion_id,
                'resena_califacion' => rand(1,5),
                'resena_texto' => $faker->word(),
            ]);
        }
        

        return true;
    }



    public function insertarPreguntas($faker){

        
        $ID_Publicaciones = DB::table('publicacions')->pluck('publicacion_id');
        foreach($ID_Publicaciones as $publicacion_id) {

            $year = rand(2021, 2022);
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year,$month ,$day , 0, 0, 0);


            DB::table('preguntas')->insert([
                'publicacion_id' => $publicacion_id,
                'pregunta_texto' => $faker->word(),
                'pregunta_fecha' => $date->format('Y-m-d H:i:s'),
            ]);
        }
        

        return true;
    }

    public function  insertarRespuestas($faker){
       
     
        $ID_Preguntas = DB::table('preguntas')->pluck('pregunta_id');
        
        foreach ($ID_Preguntas as $preguntas_id) {

            $year = rand(2021, 2022);
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year,$month ,$day , 0, 0, 0);
            
            DB::table('respuestas')->insert([
                'pregunta_id' => $preguntas_id,
                'respuesta_texto' => $faker->word(),
                'respuesta_fecha' => $date->format('Y-m-d H:i:s'),
            ]);
            
        }

        return true;
    }

    public function insertarClienteDireccions($faker){
       
        $ID_Clientes = DB::table('clientes')->pluck('cliente_id');
        $ID_Direcciones = DB::table('direccions')->pluck('direccion_id');
        
        foreach ($ID_Clientes as $cliente_id) {
            
            DB::table('cliente_direccions')->insert([
                'direccion_id' => $faker->randomElement($ID_Direcciones),
                'cliente_id' => $cliente_id,
            ]);
        
        }

        return true;
    }


    public function insertarTagsPublicaciones($faker){
       
        
        $ID_Tiendas = DB::table('tiendas')->pluck('tienda_id');
        foreach ($ID_Tiendas as $tienda_id) {

            $ID_Publicaciones = DB::table('publicacions')->where('tienda_id',$tienda_id)->pluck('publicacion_id');
            $ID_Tags = DB::table('tags')->where('tienda_id',$tienda_id)->pluck('tag_id');

            foreach ($ID_Publicaciones as $publicacion_id) {
                
                DB::table('tag_publicaciones')->insert([
                    'tag_id' => $faker->randomElement($ID_Tags),
                    'publicacion_id' => $faker->randomElement($ID_Publicaciones),
                ]);
            
            }
        }

        return true;
    }


   
    public function insertarLineaCompras($faker){
       
        

        $ID_Tiendas = DB::table('tiendas')->pluck('tienda_id');
        foreach ($ID_Tiendas as $tienda_id) {

            $ID_Publicaciones = DB::table('publicacions')->where('tienda_id',$tienda_id)->pluck('publicacion_id');
            $ID_Compras = DB::table('compras')->where('tienda_id',$tienda_id)->pluck('compra_id');

            foreach ($ID_Compras as $compra_id) {
                
                for ($i = 0 ; $i < rand(2,7) ; $i++){
                    DB::table('linea_compras')->insert([
                        'compra_id' => $compra_id,
                        'publicacion_id' => $faker->randomElement($ID_Publicaciones),
                        'cantidad' => rand(1,10),
                    ]);
                }
            }
        }

        return true;
    }

    
}
