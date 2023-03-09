<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{

    use SoftDeletes;
    use HasFactory;
    //empty array means all fields to be mass assigned
    protected $guarded = [];
 //return note title to display it in the url of every note
    public function getRouteKeyName(){
        return 'title';


    }

       /**
         * Get the user that owns the Note
         *
         *
         */
        public function user()
        {
            return $this->belongsTo(User::class);
        }


}
