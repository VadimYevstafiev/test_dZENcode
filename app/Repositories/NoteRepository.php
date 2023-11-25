<?php

namespace App\Repositories;

use App\Models\Note;
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

    // public function create(CreateProductRequest $request): Product|false
    // {
    //     try {
    //         DB::beginTransaction();

    //         $data = $this->formatRequestData($request);
    //         $data['attributes'] = $this->addSlugToAttributes($data['attributes']);
    //         ksort($data['attributes']);
    //         $product = $request->get('is_common', false)
    //             ? Product::create($data['attributes'])
    //             : auth()->user()->products()->create($data['attributes']);
    //         $this->setProductData($product, $data);

    //         DB::commit();

    //         return $product;
    //     } catch (\Exception $exception) {
    //         DB::rollBack();
    //         logs()->warning($exception);
    //         return false;
    //     }
    // }

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

    protected function formatRequestData(CreateProductRequest|UpdateProductRequest $request): array
    {
        return [
            'attributes' => collect($request->validated())->except(['categories'])->toArray(),
            'categories' => $request->get('categories', [])
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
