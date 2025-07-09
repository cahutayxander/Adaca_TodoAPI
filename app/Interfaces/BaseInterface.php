<?php

namespace App\Interfaces;

interface BaseInterface
{
    public function find(int $id);
    public function create(array $todo);
    public function update(int $id, array $newDetails);
    public function delete(int $id);
}
