<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = Book::create();

        for($i=0; $i<50 ;$i++){
            DB::table('books')->insert([
                'nombre' => $book->firstName,
                'resumen' => $book->randomElement(['Resumen1','Resumen2','Resumen3']),
                'edicion' => $book->randomElement([1,2,3,4,5]),
                'autor' => $book->firstName,
                'precio' => $book->randomElement([110.50,320.5,300,250,80])
            ]);
        }
    }
}
