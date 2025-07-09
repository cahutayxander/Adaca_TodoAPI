<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use App\Models\Todo;

class TodoRepository implements BaseInterface
{
    public function query()
    {
        // for flexibility purposes
        return Todo::query();
    }

    public function filter(array $filters)
    {
        $query = $this->query();

        if (! empty($filters['title'])) {
            $query
                ->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (isset($filters['completed'])) {
            $query
                ->where('completed', filter_var($filters['completed'], FILTER_VALIDATE_BOOLEAN));
        }

        return $query;
    }

    public function find(int $id): Todo
    {
        return Todo::find($id);
    }

    public function create(array $todo): Todo
    {
        // We can actually use DTO's but since this is only a simple CRUD app then no need to overcomplicate it.
        return Todo::create($todo);
    }

    public function update(int $id, array $newDetails): int
    {
        return Todo::whereId($id)->update($newDetails);
    }

    public function delete(int $id): void
    {
        Todo::destroy($id);
    }
}
