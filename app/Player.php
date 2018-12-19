<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function courts()
    {
        return $this->belongsToMany('App\Court')->withTimestamps(); // many to many
    }



    public static function getPlayerList()
    {
        $players = self::orderBy('name')->get();

        $playerList = [];

        foreach ($players as $player) {
            $playerList[$player['id']] = $player->name;
        }

        return $playerList;
    }
}
