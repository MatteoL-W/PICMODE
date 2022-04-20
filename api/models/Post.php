<?php

namespace Models;

use stdClass;

class Post
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create(string $description, string $picture, string $date): bool
    {
        $values = [$description, $picture, $date];
        $keys = ['description', 'picture', 'date'];

        return $this->createFromArray($values, $keys);
    }
}