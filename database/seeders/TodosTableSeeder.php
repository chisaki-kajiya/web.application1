<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'cleaning'
        ];
        Todo::create($param);

        $param = [
            'name' => 'washing'
        ];
        Todo::create($param);

        $param = [
            'name' => 'cooking'
        ];
        Todo::create($param);

        $param = [
            'name' => 'playing'
        ];
        Todo::create($param);
    }
}
