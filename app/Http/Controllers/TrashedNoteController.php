<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    //create index method to display trashed notes

    public function index(){

      //get trashed notes for currrent user
      $notes = Auth::user()->notes()->onlyTrashed()->Latest('updated_at') ->paginate(5);

      return view ('notes.index') ->with('notes',$notes);
    }


    //show single trashed note

    public function show(Note $note){


     if(!$note->user->is(Auth::user())){

        return abort(403);
     }

     return view ('notes.show')->with('note',$note);


    }

//restore trashed note
    public function update(Note $note){

        if(!$note->user->is(Auth::user())){

            return abort(403);
         }

      $note->restore();



      return to_route('notes.show',$note)->with('success','Note restored successfully');

    }

    //delete trashed note forever
    public function destroy(Note $note){

        if(!$note->user->is(Auth::user())){

            return abort(403);
         }

         $note->forceDelete();

         return to_route('trashed.index')->with('success','Note deleted successfully');



    }
}
