<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Keuangan;
use App\Models\Kategori;
use App\Models\User;
use Faker\Factory as Faker;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 20; $i++){
    		Keuangan::create([
    			'id_kategori' => Kategori::all()->random()->id,
    			'id_pengguna' => User::all()->random()->id,
    			'jumlah' => $faker->numberBetween(100000, 1000000),
    			'jenis' => rand(0,1),
    			'tanggal' => $faker->dateTimeBetween('-1 year', 'now'),
    			'deskripsi' => $faker->words(3, true),
    		]);

    	}
    }
}
