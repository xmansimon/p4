<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model

{
//    public function author() {
//        return $this->belongsTo('App\Author');
//    }
//
    public function players()
    {
        return $this->belongsToMany('App\Player')->withTimestamps();    //Many to Many
    }
    /*
    * Dump the essential details of books to the page
    * Used when practicing queries and you want to quickly see the books in the database
    * Can accept a Collection of books, or if none is provided, will default to all books
    */
    //
    public static function dump($courts = null)
    {
        # Empty array that will hold all our book data
        $data = [];

        # Determine if we should use $books as was passed to this method
        # or query for all books
        if (is_null($courts)) {
            # Query for all the books
            $courts = self::all();
        }

        # Load the data array with the book info we want
        foreach ($courts as $court) {
            $data[] = $court->name . ' located at ' . $court->location;
        }

        dump($data);
    }
}
