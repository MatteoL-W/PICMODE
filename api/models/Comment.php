<?php

namespace Models;

class Comment extends BaseModel
{

    public string $entity = 'comment';

    public function create(string $text): bool
    {
        $values = [$text];
        $keys = ['text'];

        return $this->createFromArray($values, $keys);

    }


}