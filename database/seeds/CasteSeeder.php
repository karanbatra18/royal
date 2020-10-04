<?php

use Illuminate\Database\Seeder;

class CasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Agarwal',
            'Agarwal',
            'Arya',
            'Baniya',
            'Bhatia',
        ];

        foreach($data as $value) {
            \App\Models\Caste::Create(
                [
                    'name' => $value,
                    'parent_id' => 0,
                    ]);
        }
    }
}
