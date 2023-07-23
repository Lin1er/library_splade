<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelas;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'username' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => 'secret123',
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'Siswa',
            'username' => 'Siswa',
            'role_id' => 3,
            'email' => 'siswa@gmail.com',
            'password' => 'secret123',
        ]);

        \App\Models\User::factory(10)->create();


        \App\Models\Category::factory()->create([
            'name' => 'Novel',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Islami',
        ]);

        \App\Models\Category::factory()->create([
            'name' => 'Biografi',
        ]);

        Role::factory()->create([
            'name' => 'admin',
        ]);
        Role::factory()->create([
            'name' => 'guru',
        ]);
        Role::factory()->create([
            'name' => 'siswa',
        ]);

        // Kelas 10
        Kelas::factory()->create([
            'nama_kelas' => 'X A',
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'X B',
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'X C',
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'X D',
        ]);

        // Kelas 11
        Kelas::factory()->create([
            'nama_kelas' => 'XI A',
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'XI B',
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'XI C',
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'XI D',
        ]);
        
        // Kelas 12
        Kelas::factory()->create([
            'nama_kelas' => 'XII A',
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'XII B',
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'XII C',
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'XII D',
        ]);
    }
}
