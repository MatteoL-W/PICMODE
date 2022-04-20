<?php

namespace Models;

class Post extends BaseModel
{
   public string $entity = 'post';

    public function create(string $description, string $picture, string $date): bool
    {
        $values = [$description, $picture, $date];
        $keys = ['description', 'picture', 'date'];

        return $this->createFromArray($values, $keys);
    }
}