<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Status;

use App\Models\Category;
use App\Models\Condition;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'name' => 'Iqbal',
            'nim' => 'F1E121155',
            'email' => 'iqbal@example.com',
            'password' => bcrypt('12345'),
            'no_hp' => '6282284928931'
        ]);
        User::create([
            'name' => 'Arif',
            'nim' => 'F1E121079',
            'email' => 'arif@example.com',
            'password' => bcrypt('12345'),
            'no_hp' => '6282284928932'
        ]);
        User::create([
            'name' => 'Irfan',
            'nim' => 'F1E121110',
            'email' => 'irfan@example.com',
            'password' => bcrypt('12345'),
            'no_hp' => '6282284928933'
        ]);
        User::create([
            'name' => 'Reny',
            'nim' => 'F1E121089',
            'email' => 'reny@example.com',
            'password' => bcrypt('12345'),
            'no_hp' => '6282284928934'
        ]);

        // Post::factory(5)->create();
        // User::factory(3)->create();
        
        Category::create([
            'name' => 'Perangkat Elektronik',
            'slug' => 'perangkat-elektronik'
        ]);
        Category::create([
            'name' => 'Perhiasan',
            'slug' => 'perhiasan'
        ]);
        Category::create([
            'name' => 'Dokumen Penting',
            'slug' => 'dokumen-penting'
        ]);

        Condition::create([
            'name' => 'Hilang',
            'slug' => 'hilang'
        ]);
        Condition::create([
            'name' => 'Ditemukan',
            'slug' => 'ditemukan'
        ]);

        Status::create([
            'name' => 'Gagal'
        ]);
        Status::create([
            'name' => 'Diproses'
        ]);
        Status::create([
            'name' => 'Selesai'
        ]);

        Post::create([
            'title'=>'HP vivo',
            'slug'=>'hp-vivo',
            'body'=>'Kosong bang',
            'category_id'=>1,
            'user_id'=>2,
            'condition_id'=>2
        ]);
        Post::create([
            'title'=>'Laptop Asus',
            'slug'=>'laptop-asus',
            'body'=>'Kosong bang',
            'category_id'=>1,
            'user_id'=>3,
            'condition_id'=>1
        ]);
        Post::create([
            'title'=>'KTP',
            'slug'=>'ktp',
            'body'=>'Kosong bang',
            'category_id'=>3,
            'user_id'=>2,
            'condition_id'=>2
        ]);
        Post::create([
            'title'=>'Kalung',
            'slug'=>'kalung',
            'body'=>'Kosong bang',
            'category_id'=>2,
            'user_id'=>4,
            'condition_id'=>1
        ]);
        Post::create([
            'title'=>'Cincin',
            'slug'=>'cincin',
            'body'=>'Kosong bang',
            'category_id'=>2,
            'user_id'=>1,
            'condition_id'=>2
        ]);
        Post::create([
            'title'=>'KTM',
            'slug'=>'ktm',
            'body'=>'Kosong bang',
            'category_id'=>3,
            'user_id'=>2,
            'condition_id'=>1
        ]);
    }
}
