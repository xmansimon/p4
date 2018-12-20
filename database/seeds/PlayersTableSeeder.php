<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = [
            ['Alice','2.0','alice@gmail.com'],
            ['Bob','2.5','bob@gmail.com'],
            ['Charles','4.0','charles@gmail.com'],
            ['David','2.0','david@gmail.com'],
            ['Elli','4.0','lio@gmail.com'],
            ['Frank','5.0','frank@gmail.com'],
            ['George','2.0','george@gmail.com'],
            ['Henry','2.0','henery@gmail.com'],

        ];

        foreach ($players as $key => $playerData) {
            $player = new Player();
            $player->name = $playerData[0];
            $player->level = $playerData[1];
            $player->email = $playerData[2];


            $player->save();
        }
    }
}
