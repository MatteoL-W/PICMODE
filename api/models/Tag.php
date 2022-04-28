<?php

namespace Models;

class Tag extends BaseModel
{
    public string $entity = 'tag';

    public function create(string $name): bool
    {
        $values = [$name];
        $keys = ['name'];

        return $this->createFromArray($values, $keys);
    }
}