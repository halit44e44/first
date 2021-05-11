<?php
namespace Database\Seeders;

use App\Models\Question;
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
        /*
            php artisan db:seed --class=QuizSeeder dediğimizde sadece o clası yeniler verileri oluşturur.
        */
        $this->call([
            UserSeeder::class,
            QuizSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}
