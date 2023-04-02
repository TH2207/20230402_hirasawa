<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserve;

class ReservesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'shop_id' => 20,
            'reserve_at' => '2023-03-01 00:00:00',
            'reserve_person' => 5
        ];
        Reserve::create($param);
    }
}
