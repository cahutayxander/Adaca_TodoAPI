<?php

namespace App\Interfaces;

interface BaseInterface
{
    public function find();
    public function create();
    public function update();
    public function delete();
}
