<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use App\Models\Todo;

class TodoRepository extends BaseInterface
{
    public function find(int $id): Todo
    {
        return Todo::find($id);
    }

    public function create(array $todo): Todo
    {
        // We can actually use DTO's but since this is only a simple CRUD app then no need to overcomplicate it.
        return Todo::create($todo);
    }

    public function update(int $id, array $newDetails): Todo
    {
        return Todo::whereId($id)->update($newDetails);
    }

    public function delete(int $id): void
    {
        Todo::destroy($id);
    }
}
