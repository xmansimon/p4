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
            [ 'Boston Common Tennis Court', 'Boston Common','Boston', '02108','outdoor','david Smith', 'https://www.google.com'],
            [ 'Joe Moakley Park Tennis Courts' , 'Joe Moakley Park','Boston', '02125','outdoor', 'Uda Lane', 'https://www.google.com'],
            [ 'Southwest Corridor Park- Tennis Courts' , '260 Albert St', 'Boston',  '02120','outdoor', 'Koko Wang', 'https://www.google.com'],
            [ 'Beren Tennis Center' , '65 N Harvard St', 'Boston', '02134', 'indoor','bb Sam', 'https://www.google.com'],
            [ 'Amory Tennis Center' , '45 Amory St', 'Brookline', '02445', 'outdoor','bob Sam', 'https://www.google.com'],
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
            $court->street = $courtData[1];
            $court->city = $courtData[2];
            $court->zip = $courtData[3];
            $court->type = $courtData[4];

            $court->owner = $courtData[5];

            //$court->author_id = $author_id;
            $court->link_url = $courtData[6];

            $court->save();
            $count--;
        }
    }
}
