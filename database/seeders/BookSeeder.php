<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()
            ->count(50)
            ->has(Author::factory()->count(1), 'authors')
            ->has(Publisher::factory()->count(1), 'publishers')
            ->create();
    }
}
