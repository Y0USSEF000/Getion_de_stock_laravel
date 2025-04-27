<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StagiairesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('stagiaires')->insert([
            ['nom' => 'Dupont', 'prenom' => 'Jean', 'age' => 22],
            ['nom' => 'Martin', 'prenom' => 'Lucie', 'age' => 21],
            ['nom' => 'Bernard', 'prenom' => 'Pierre', 'age' => 23],
        ]);

        DB::table('anciens_stagiaires')->insert([
            ['nom' => 'Leroy', 'prenom' => 'Sophie', 'age' => 24],
            ['nom' => 'Moreau', 'prenom' => 'Thomas', 'age' => 25],
        ]);

        DB::table('notes')->insert([
            ['stagiaire_id' => 1, 'matiere' => 'Mathématiques', 'note' => 15.5],
            ['stagiaire_id' => 1, 'matiere' => 'Informatique', 'note' => 18.0],
            ['stagiaire_id' => 2, 'matiere' => 'Mathématiques', 'note' => 12.0],
            ['stagiaire_id' => 3, 'matiere' => 'Informatique', 'note' => 16.5],
        ]);
    }
}