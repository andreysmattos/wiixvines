<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
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
            'link' => 'watch?v=fuPcWwDYulM',
            'server' => 'Impera',
            'playmode' => 'PvP',
            'pvptype' => 'Open PvP',
            'description' => str_random(10),

        ]);

         DB::table('vines')->insert([
            'channel_id' => 3,
            'channel_name' => 'lucaszera',
            'title' => str_random(10),
            'link' => 'watch?v=6FHv5wsvFXc',
            'server' => 'Impera',
            'playmode' => 'PvP',
            'pvptype' => 'Open PvP',
            'description' => str_random(10),

        ]);

         DB::table('vines')->insert([
            'channel_id' => 3,
            'channel_name' => 'lucaszera',
            'title' => str_random(10),
            'link' => 'watch?v=8H8UCPSAx20',
            'server' => 'Impera',
            'playmode' => 'PvP',
            'pvptype' => 'Open PvP',
            'description' => str_random(10),

        ]);

         DB::table('vines')->insert([
            'channel_id' => 3,
            'channel_name' => 'lucaszera',
            'title' => str_random(10),
            'link' => 'watch?v=ymDnZqI2fGk',
            'server' => 'Impera',
            'playmode' => 'PvP',
            'pvptype' => 'Open PvP',
            'description' => str_random(10),

        ]);

         DB::table('vines')->insert([
            'channel_id' => 3,
            'channel_name' => 'lucaszera',
            'title' => str_random(10),
            'link' => 'watch?v=C9lXyATYN48',
            'server' => 'Impera',
            'playmode' => 'PvP',
            'pvptype' => 'Open PvP',
            'description' => str_random(10),

        ]);

         DB::table('vines')->insert([
            'channel_id' => 3,
            'channel_name' => 'lucaszera',
            'title' => str_random(10),
            'link' => 'watch?v=SUpea-Y_zhA',
            'server' => 'Impera',
            'playmode' => 'PvP',
            'pvptype' => 'Open PvP',
            'description' => str_random(10),

        ]);
    }
}
