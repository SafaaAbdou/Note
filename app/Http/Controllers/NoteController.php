<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //get notes for currrent user
         $notes = Auth::user()->notes()->Latest('updated_at') ->paginate(5);

         return view ('notes.index') ->with('notes',$notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         //store note in the data base
         $request->validate([
            'title' =>'required|max:120',
            'text' =>'required'

           ]);
          //allow user to add new note to his notes table without needing to add user id manually every time
           Auth::user()->notes()->create([

               //'user_id' =>Auth::id(),
               'title' =>$request->title,
               'text'  =>$request->text,
           ]);


          return to_route('notes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
         //show single note view
         if(!$note->user->is(Auth::user())){

            return abort(403);
         }

         return view ('notes.show')->with('note',$note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {


        //edit single note view
        if(!$note->user->is(Auth::user())){

            return abort(403);
         }

         return view ('notes.edit')->with('note',$note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {



        //update single note view
        if(!$note->user->is(Auth::user())){

            return abort(403);
         }

         //update note in the data base
         $request->validate([
            'title' =>'required|max:120',
            'text' =>'required'

           ]);

           $note ->update([

               'title' =>$request->title,
               'text'  =>$request->text,
           ]);


          return to_route('notes.show',$note)->with('success','Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //check if the user id
        if(!$note->user->is(Auth::user())){

            return abort(403);
         }
         $note ->delete();


         return to_route('notes.index')->with('success','Note moved to trash successfully');



    }
}
