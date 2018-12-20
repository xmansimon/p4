<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Court;
use App\Player;

class TennisController extends Controller
{

//Route::get('/tennis', 'TennisController@index');

    public function index()
    {

        $courts = Court::orderBy('title')->get();

        $newCourts = $courts->sortByDesc('created_at')->take(3);

        return view('courts.index')->with([
            'courts' => $courts,
            'newCourts' => $newCourts
        ]);
    }

    //Route::get('/tennis/{id}', 'TennisController@show');
    public function show(Request $request, $id)
    {
        $court = Court::find($id);

        return view('courts.show')->with([
            'court' => $court
        ]);
    }


    public function create(Request $request)
    {
        $players = Player::getPlayerList();
        $types =  Court::distinct('type')->get();

        return view('courts.create')->with([
            //'authors' => $authors,
            'type' => $types,
            'players' => $players
        ]);
    }

    /**
     * POST /books
     * Process the form for adding a new book
     */
    public function store(Request $request)
    {
        # Validate the request data
        $request->validate([
            'title' => 'required',
            'street'=>'required',
            'city' => 'required',
            'type' => 'required',
            'zip' => 'required|digits:5|numeric',
            'link_url' => 'required|url'
        ]);

        $court = new Court();
        $court->title = $request->title;
        $court->type = $request->type;

        $court->street = $request->street;
        $court->city = $request->city;
        $court->zip = $request->zip;
        $court->link_url = $request->link_url;
        $court->save();

        return redirect('/tennis')->with([
            'alert' => 'New court was added.'
        ]);
    }

    /*
    * Route::get('/tennis/{id}/edit', 'TennisController@edit');
    */
    public function edit($id)
    {
        $court = Court::find($id);

        if (!$court) {
            return redirect('/tennis')->with([
                'alert' => 'Court not found.'
            ]);
        }

        return view('courts.edit')->with([
            'court' => $court
        ]);
    }

    /*
    * PUT
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'street'=>'required',
            'city' => 'required',
            'type' => 'required',
            'zip' => 'required|digits:5|numeric',
            'link_url' => 'required|url',
        ]);

        $court = Court::find($id);

        $court->title = $request->title;
        $court->type = $request->type;
        $court->street = $request->street;
        $court->city = $request->city;
        $court->zip = $request->zip;
        $court->link_url = $request->link_url;
        $court->save();

        return redirect('/tennis/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }

    /*Delete
   */
    public function delete($id)
    {
        $court = Court::find($id);

        if (!$court) {
            return redirect('/tennis')->with('alert', 'Court not found');
        }

        return view('courts.delete')->with([
            'court' => $court,
        ]);
    }
    public function destroy($id)
    {
        $court = Court::find($id);

       $court->players()->detach();

        $court->delete();

        return redirect('/tennis')->with([
            'alert' => '“' . $court->title . '” was removed.'
        ]);
    }

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


    public function addprocess(Request $request,$id){
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


