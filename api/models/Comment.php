<?php

namespace Models;

class Comment extends BaseModel
{

    public string $entity = 'comment';

    public function create(string $text, int $idUser, int $idPost): bool
    {
        $values = [$text, $idUser, $idPost];
        $keys = ['text', 'idUser', 'idPost'];

        return $this->createFromArray($values, $keys);

    }


}