<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Divisi;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory(100000)->create();

        // $faker  = Factory::create();
        // for ($i=0; $i <100000 ; $i++) { 
        //    $dataCategory[]  = [
        //     'name'  => $faker->name(),
        //     'slug'  => $faker->unique()->slug(),
        //    ];
        // }

        // foreach (array_chunk($dataCategory, 1000) as $item ) {
        //    Category::insert($item);
        // }


        User::create([
            'name'      => 'Admin',
            'email'     =>  'admin@gmail.com',
            'password'  => bcrypt('123'),
            'is_admin'  => 1,
        ]);

        User::create([
            'name'      => 'zeral',
            'email'     =>  'zeral@gmail.com',
            'password'  => bcrypt('123'),
            'is_admin'  => 0,
        ]);

        Divisi::create([
            'name' => 'Inti',
            'slug' => 'inti',
            'definisi' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, unde?',
            'image' => 'kosong.img'
        ]);

        Divisi::create([
            'name' => 'Litbang',
            'slug' => 'litbang',
            'definisi' => 'Divisi Litbang adalah Devisi Penelitian dan Pengembangan. Dimana Tugas dan perananya adalah fokus pada pengembangan Softskill dan Hardskill di bidang teknik informatika baik dalam Internal mahasiswa Prodi Teknik Informatika. ',
            'image' => 'kosong.img'
        ]);

        Divisi::create([
            'name' => 'Program',
            'slug' => 'program',
            'definisi' => 'divisi program adalah divisi yang menyokong perkembangan infrastruktur organisasi dengan memanfaatkan teknologi digital agar mempermudah dalam mengelola rancangan kegiatan',
            'image' => 'kosong.img'
        ]);

        Divisi::create([
            'name' => 'Humas',
            'slug' => 'humas',
            'definisi' => 'Program kerja devisi humas yaitu HMTI berbagi, HMTI bersama, Fun Day HMTI dan familly gathering HMTI, Menjalin kerjasama dengan perusahaan dan antar kampus.',
            'image' => 'kosong.img'
        ]);

        Divisi::create([
            'name' => 'Media',
            'slug' => 'media',
            'definisi' => 'Divisi yang mempunyai tujuan untuk menghimpun, mengolah dan mempublikasikan informasi mengenai dunia Teknik Informatika dan menjadi wadah bagi mahasiswa Teknik Informatika Universitas Ibnu Sina yang mempunyai minat di bidang multimedia Terutama dalam lingkup HMTI.',
            'image' => 'kosong.img'
        ]);

        Category::create([
            'name' => 'Study Club',
            'slug' => 'study-club'
        ]);

        Category::create([
            'name' => 'Family Gathering',
            'slug' => 'family-gathering'
        ]);

        Category::create([
            'name' => 'Rapat',
            'slug' => 'rapat'
        ]);

        Category::create([
            'name' => 'Seminar',
            'slug' => 'seminar'
        ]);


        Category::create([
            'name' => 'Workshop',
            'slug' => 'workshop'
        ]);

        Category::create([
            'name' => 'Interview',
            'slug' => 'interview'
        ]);
        Category::create([
            'name' => 'Funday',
            'slug' => 'funday'
        ]);

        Category::create([
            'name' => 'Webinar',
            'slug' => 'webinar'
        ]);

        Category::create([
            'name' => 'HMIT Berbagi',
            'slug' => 'hmti-berbagi'
        ]);
        
        
        
        // \App\Models\User::factory(10)->create();
    
    
    }
}
