<?php

use Illuminate\Database\Seeder;

class VinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('vines')->insert([
            'channel_id' => 3,
            'channel_name' => 'lucaszera',
            'title' => str_random(10),
            'link' => 'watch?v=Ea3-Pcejfio',
            'server' => 'Impera',
            'playmode' => 'PvP',
            'pvptype' => 'Open PvP',
            'description' => 'Rei lucas teste tst',

        ]);
    }
}
