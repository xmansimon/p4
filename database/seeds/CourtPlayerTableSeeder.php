<?php

use Illuminate\Database\Seeder;
use App\Court;
use App\Player;

class CourtPlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courts =[
            'Boston Common Tennis Court' => ['Alice', 'Bob','Henry'],
            'Joe Moakley Park Tennis Courts' => ['Bob', 'Elli'],
            'Southwest Corridor Park- Tennis Courts' => ['Frank', 'David'],
            'Beren Tennis Center' => ['Alice', 'David'],
            'Amory Tennis Center' => ['David'],
        ];

        # create a pivot
        foreach ($courts as $title => $players) {

            $court = Court::where('title', 'like', $title)->first();

            foreach ($players as $name ) {
                $player = Player::where('name', 'like', $name)->first();

                # Connect player name to the court
                $court->players()->save($player);
            }
        }
    }
}
