<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Validator;

class NotesController extends Controller
{
    public function createNote(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors()->all()[0]
            ],400);
        }

        $note = Note::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $response = [
            'status' => true,
            'message' => "Note Created Successfully",
        ];
        return response()->json($response);
    }

    public function getNotes()
    {
        $notes = Note::all();
        $response = [
            'status' => true,
            'message' => "Note Fetched Successfully",
            'data' => $notes,
        ];
        return response()->json($response);
    }

    public function updateNote(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors()->all()[0]
            ],400);
            
        }

        $note = Note::where('id', $id)->first();
        if($note){
            $note->title = $request->title;
            $note->content = $request->content;
            $note->update();
            
            return response()->json([
                'status' => true,
                'message' => "Note Updated Successfully"
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Note not found"
            ],404);
        }
    }

    public function deleteNote($id)
    {
        $note = Note::where('id', $id)->first();
        if($note){
            $note->delete();
            return response()->json([
                'status' => true,
                'message' => "Note Deleted Successfully"
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Note not found"
            ],404);
        }
    }
}
