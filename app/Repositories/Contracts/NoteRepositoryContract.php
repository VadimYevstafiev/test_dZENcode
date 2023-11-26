<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\CreateNoteRequest;
use App\Models\Note;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;

interface NoteRepositoryContract
{
    public function create(CreateNoteRequest $request):bool;

    public function getHeads(int $perPage, Request $request): array;

    public function paginate(int $perPage, Request $request): LengthAwarePaginator;

    public function formatCreateData(Request $request): array|null;
}
