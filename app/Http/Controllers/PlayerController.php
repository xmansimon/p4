<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Court;
use App\Player;

class PlayerController extends Controller
{


    /*Add a player*/
    public function add($id)
    {
        $court = Court::find($id);
        $players = Player::getPlayerList();
        $playersAtCourt = $court->players()->pluck('players.name')->toArray();

        if (!$court) {
            return redirect('/tennis')->with([
                'alert' => 'Court not found.'
            ]);
        }

        return view('courts.player')->with([
            'court' => $court,
            'players' => $players,
            'playersAtCourt' => $playersAtCourt

        ]);

    }


    public function addproces(Request $request,$id){
        # Validate the request data
        $request->validate([
            'email' => 'required|email',
            'name'=>'required',
            'level' => 'required|numeric|between:0,7.0',
        ]);
        $player = new Player();
        $player-> name = $request->name;
        $player-> email = $request->email;
        $player-> level = $request->level;
        $player->save();

        $court = Court::find($id);
        $court->players()->attach($player);


        return redirect()->action(
            'TennisController@show', ['id' => $id])->with([
            'alert' => 'Your record was added.'
        ]);

    }

}


