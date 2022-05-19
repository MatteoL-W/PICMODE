<?php

namespace Models;

class Clothing extends BaseModel
// Méthodes selectAll, select, update, delete dans BaseModel.php
{
    public string $entity = 'clothing';

    public function create(string $type, string $color, string $url_shop, string $style, string $store, int $idTag): bool
    {
        $values = [$type, $color, $url_shop, $style, $store, $idTag];
        $keys = ['type', 'color', 'url_shop', 'style', 'store', 'idTag'];

        return $this->createFromArray($values, $keys);
    }

    public function selectAllFromPost(int $id): array
    {
        $this->db->query("SELECT clothing.* FROM clothing JOIN contains ON contains.idClothing = clothing.id JOIN post ON contains.idPost = post.id WHERE post.id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetchAll();
    }

    //Méthode pour selectionner tous les posts d'un User
    public function selectAllClothesFromUserId(int $idUser)
    {
        $this->db->query("SELECT clothing.* FROM clothing INNER JOIN contains ON clothing.id = contains.idClothing INNER JOIN post ON contains.idPost = post.id INNER JOIN user On post.idUser = user.id WHERE user.id = :id");
        $this->db->bind(':id', $idUser);
        return $this->db->fetchAll();
    }
}