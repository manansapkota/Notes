<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\StoreNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends Controller
{
    
    public function index()
    {
        $notes = Note::latest()->get();

        return response()->json($notes,Response::HTTP_OK);
    }

    
    public function store(StoreNoteRequest $request)
    {
        $input = $request->validated();
        $note = Note::create([
            'title' => $input['title'],
            'description' => $input['description']
        ]);

        $note->tags()->syncWithoutDetaching($input['tag_id']);

        return response()->json($note,Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $deleted = $note->delete();

        if (!$deleted) {
            return response()->json(['error' => 'Note Deletion Failed']);
        }

        return response()->json(['success' => 'Note Deleted Successfully']);
    }
}
