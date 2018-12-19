<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = ['Alice', 'Bob', 'Charles', 'David', 'Elli', 'Frank', 'George', 'Henery'];

        foreach ($players as $player) {
            $player = new Player();
            $player->name = $players;
            $player->save();
        }
    }
}
