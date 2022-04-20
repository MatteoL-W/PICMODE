<?php

namespace Models;

use stdClass;

class Comment
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create(string $text): bool
    {
        $values = [$text];
        $keys = ['text'];

        return $this->createFromArray($values, $keys);

    }


}