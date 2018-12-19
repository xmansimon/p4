<?php

use Illuminate\Database\Seeder;
use App\Court;

class CourtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courts = [
            [ 'Boston Common Tennis Court', 'Boston, MA 02108','david Smith', 'https://www.google.com'],
            [ 'Joe Moakley Park Tennis Courts' , 'Boston, MA 02125', 'Uda Lane', 'https://www.google.com'],
            [ 'Southwest Corridor Park- Tennis Courts' , '260 Albert St, Boston, MA 02120', 'Koko Wang', 'https://www.google.com'],
            [ 'Beren Tennis Center' , '65 N Harvard St, Boston, MA 02134', 'bb Sam', 'https://www.google.com'],

        ];

        $count = count($courts);

        foreach ($courts as $key => $courtData) {
            # First, figure out the id of the author we want to associate with this book

            # Extract just the last name from the court data...
//            $name = explode(' ', $courtData[2]);
//            $lastName = array_pop($name);
//
//            # Find that author in the authors table
//            $author_id = Author::where('last_name', '=', $lastName)->pluck('id')->first();


            $court = new Court();

            $court->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $court->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $court->title = $courtData[0];
            $court->player = $courtData[2];

            //$court->author_id = $author_id;
            $court->location = $courtData[1];
            $court->link_url = $courtData[3];

            $court->save();
            $count--;
        }
    }
}
