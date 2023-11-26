<?php

namespace App\Repositories;

use App\Http\Requests\CreateNoteRequest;
use App\Models\Note;
use App\Models\User;
use App\Repositories\Contracts\NoteRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NoteRepository implements NoteRepositoryContract
{
    protected array $pagResult;
    // public function __construct(protected ImageRepositoryContract $imageRepository){}

    public function create(CreateNoteRequest $request): bool
    {
        try {
            DB::beginTransaction();
            $fields = $this->formatRequestData($request);
            Note::create($fields);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            logs()->warning($exception);
            return false;
        }
    }

    public function getHeads(int $perPage, Request $request): array
    {   
        $params = $request->all();
        $id = empty($params) ? 11 : array_key_first($params);
        list($column, $key) = str_split($id);
        switch($column) {
            case 1:
                $column = 'users.user_name';
                break;
            case 2:
                $column = 'users.email';
                break;
            case 3:
                $column = 'notes.created_at';
                break;
        }
        switch($key) {
            case 1:
                $key = 'asc';
                break;
            case 2:
                $key = 'desc';
                break;
        }
        $heads = Note::whereNull('parent_id')
            ->join('users', 'notes.author_id', '=', 'users.id')
            ->select( 'users.user_name', 'users.email', 'notes.created_at')
            ->orderBy($column, $key)
            ->paginate($perPage);
        return array($heads, $id);
    }

    public function paginate(int $perPage, Request $request): LengthAwarePaginator
    {
        $notes = Note::whereNull('parent_id')
            ->with('author', 'childs')
            ->get();
        $this->pagResult = [];
        foreach($notes as $note) {
            $this->getNote($note, 0);
        }
        $page = Paginator::resolveCurrentPage() ?: 1;

        $items = Collection::make($this->pagResult);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            ['path' => Paginator::resolveCurrentPath()]);
    }

    protected function getNote(Note $note, int $left): void
    {
        $this->pagResult[] = [
            'id' => $note->id,
            'user' => $note->author->user_name,
            'content' => $note->content,
            'left' => $left
        ];
        if (count($note->childs)) {
            $left += 4;
            foreach($note->childs as $note) {
                $this->getNote($note, $left);
            }
        }
    }

    public function formatCreateData(Request $request): array|null
    {
        $id = array_key_first($request->all());
        if (!$id) return null;
        $parent = Note::where('id', $id)->with('author')->first();
        return [
            'id' => $parent->id,
            'user' => $parent->author->user_name,
            'content' => $parent->content,
        ];
    }

    protected function formatRequestData(CreateNoteRequest $request): array
    {
        $data = $request->validated();
        return [
            'author_id' => User::where('user_name', $data['user_name'])->first()->id,
            'parent_id' => $data['parent_id'],
            'content' => $data['content'],
        ];
    }

    // protected function setProductData(Product $product, array $data)
    // {
    //     $this->setCategories($product, $data['categories']);
    //     $this->attachImages($product, $data['attributes']['images'] ?? []);
    // }

    // public function setCategories(Product $product, array $categories = []): void
    // {
    //     if ($product->categories()->exists()) {
    //         $product->categories()->detach();
    //     }

    //     if (!empty($categories)) {
    //         $product->categories()->attach($categories);
    //     }
    // }

    // protected function attachImages(Product $product, array $images = [])
    // {
    //     $this->imageRepository->attach($product, 'images', $images, $product->slug);
    // }

    // protected function addSlugToAttributes(array $attributes): array
    // {
    //     return array_merge(
    //         $attributes,
    //         ['slug' => Str::of($attributes['title'])->slug('-')->value()]
    //     );
    // }
}
