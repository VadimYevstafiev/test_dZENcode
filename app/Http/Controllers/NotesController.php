<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Repositories\Contracts\NoteRepositoryContract;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(Request $request)
    {
        dd('$notes');
        return view('index');
    }

    public function notes(Request $request, NoteRepositoryContract $repository)
    {
        $notes = $repository->paginate(5, $request);
        return view('notes', compact('notes'));
    }
}
