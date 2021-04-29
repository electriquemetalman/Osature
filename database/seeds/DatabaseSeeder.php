<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        /**
         * Insertion des roles
         */
        DB::table('roles')->insert([
            ['nom' => 'Administrateur','slug' => 'adm'],
            ['nom' => 'Secretaire','slug' => 'sec'],
        ]);
        /**
         * Création des comptes
         */
        DB::table('comptes')->insert([
            [
                'nom' => 'aabbb',
                'prenom' => 'bbccc',
                'nomuser' => 'aabbb bbccc',
                'email' => 'stivingtatga@gmail.com',
                'password' => '$2y$10$LIjHc7FzISFWj2uyoEvameEPBdhYHDSz7iG2pF9AII0teyyrdQsTe', //Bronde123
                'pays' => '',
                'type' => 'administrateur',
                'statut' => 1,
                'roles_id' => 1,
            ],
            [
                'nom' => 'NANA',
                'prenom' => 'Gabin',
                'nomuser' => 'Gabe N',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$spscQEMUKeJxNeED2EJQFusGtjA/cwF/OTQTFMQou/RJAThazrrJq', //adminadmin
                'pays' => 'Cameroun',
                'type' => 'client',
                'statut' => 1,
                'roles_id' => NULL,
            ]
        ]);

        /**
         * Insertion des permissions
         */
        DB::table('permissions')->insert([
            ['intitule' => 'About Us','nom' => 'voir_aboutUs'],
            ['intitule' => 'FAQ','nom' => 'voir_faq'],
            ['intitule' => 'Contact','nom' => 'voir_contact'],
            ['intitule' => 'Investment','nom' => 'voir_investment'],
            ['intitule' => 'Compte Utilisateur','nom' => 'voir_compte'],
            ['intitule' => 'News','nom' => 'voir_news'],
        ]);

        /**
         * Insertion des permissions
         */
        DB::table('permission_roles')->insert([
            ['roles_id' => 1,'permissions_id' => 5],
        ]);
    }
}
