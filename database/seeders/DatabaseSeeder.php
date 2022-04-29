<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Medicine;
use App\Models\Offer;
use App\Models\Pharmacist;
use App\Models\Pharmacy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    $this->call([UserTableSeeder::class]);
    Category::factory(20)->create();
    Medicine::factory(100)->create();
    Pharmacy::factory(20)->create();
    Pharmacist::factory(40)->create();
    Offer::factory(5)->has(Medicine::factory()->count(7))->create();
  }
}
