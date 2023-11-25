<?php

namespace App\Repositories\Contracts;

use App\Models\Note;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;

interface NoteRepositoryContract
{
   //public function create(CreateProductRequest $request): Note|false;

    public function paginate(int $perPage, Request $request): LengthAwarePaginator;
}
