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
            'name' => 'Cleaning kitchen',
            'tag_id' => 1,
            'user_id' => 1

        ];
        Todo::create($param);

        $param = [
            'name' => 'Washing bathroom',
            'tag_id' => 1,
            'user_id' => 1

        ];
        Todo::create($param);

        $param = [
            'name' => 'Yogurt',
            'tag_id' => 4,
            'user_id' => 1

        ];
        Todo::create($param);

        $param = [
            'name' => 'Komeda coffee @11:00',
            'tag_id' => 5,
            'user_id' => 1
        ];
        Todo::create($param);
    }
}
