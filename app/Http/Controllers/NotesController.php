<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNoteRequest;
use App\Models\Note;
use App\Repositories\Contracts\NoteRepositoryContract;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(Request $request, NoteRepositoryContract $repository)
    {
        //dd($request);
        list($items, $id) = $repository->getHeads(25, $request);

        return view('index', compact('items', 'id'));
    }

    public function notes(Request $request, NoteRepositoryContract $repository)
    {
        $notes = $repository->paginate(25, $request);

        return view('notes', compact('notes'));
    }

    public function create(Request $request, NoteRepositoryContract $repository)
    {
        $parent = $repository->formatCreateData($request);

        return view('create', compact('parent'));
    }

    public function store (CreateNoteRequest $request, NoteRepositoryContract $repository)
    {
        return $repository->create($request)
        ? redirect()->route('notes')
        : redirect()->back()->withInput();
    }
}
