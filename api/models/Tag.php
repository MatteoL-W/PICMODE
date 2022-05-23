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

    public function getTagFromIdPost(int $id) {
        $this->db->query("SELECT tag.* FROM tag JOIN clothing ON clothing.idTag = tag.id JOIN contains ON contains.idClothing = clothing.id JOIN post ON contains.idPost = post.id WHERE post.id = :id");
        $this->db->bind(":id", $id);
        return $this->db->fetchAll();
    }
}