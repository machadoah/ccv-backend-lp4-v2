<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vaga;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // protected $fillable = ['id','titulo','salario', 'local','empresa','tecnologia'];

        Vaga::create([
            'titulo' => 'Desenvolvedor Fullstack',
            'salario' => 6000,
            'local' => 'Remoto',
            'empresa' => 'Dev Tech',
            'tecnologia' => 'Spring Boot e Angular'
        ]);

        Vaga::create([
            'titulo' => 'Desenvolvedor Frontend',
            'salario' => 5500,
            'local' => 'São Paulo - SP',
            'empresa' => 'Global Tech',
            'tecnologia' => 'Next.js e React'
        ]);

        Vaga::create([
            'titulo' => 'Desenvolvedor Backend',
            'salario' => 4800,
            'local' => 'Santos - SP',
            'empresa' => 'Inter Inc.',
            'tecnologia' => 'PHP, Laravel e Symfony'
        ]);
    }
}
