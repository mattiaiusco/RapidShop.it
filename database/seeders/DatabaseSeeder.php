<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'luke',
        //     'email' => 'luca@luca.com',
        //     'password' => Hash::make('password')
        // ]);

        $categories = [
            'Casa e Giardino',
            'Console e Videogiochi',
            'Cinema Libri e Musica',
            'Sport e Tempo Libero',
            'Telefonia e Accessori',
            'Informatica e Elettronica',
            'TV, Audio e Fotocamere',
            'Collezionismo',
            'Moda e Accessori',
            'Auto e Moto',
            'Elettrodomestici'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
