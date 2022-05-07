<?php

namespace Models;

use stdClass;

class Contains extends BaseModel
// Méthodes selectAll, select, update, delete dans BaseModel.php
{
    public string $entity = 'contains';

    public function create(int $idPost, int $idClothing): bool
    {
        $values = [$idPost, $idClothing];
        $keys = ['idPost', 'idClothing'];

        return $this->createFromArray($values, $keys);
    }

    public function selectAllClothingFromPostId(int $idPost)
    {
        $this->db->query("SELECT * FROM contains WHERE idPost = :id");
        $this->db->bind(':id', $idPost);
        return $this->db->fetchAll();
    }

    public function countClothingFromPostId(int $idPost)
    {
        $this->db->query("SELECT COUNT(*) FROM contains WHERE idPost = :id");
        $this->db->bind(':id', $idPost);
        return $this->db->fetch();
    }

    // On override la fonction déjà présente dans BaseModel.php
    public function delete(int $id, int $idClothing = -1): bool
    {
        $this->db->query("DELETE FROM contains WHERE idPost = :idPost AND idClothing = :idClothing");
        $this->db->bind(':idPost', $id);
        $this->db->bind(':idClothing', $idClothing);

        return $this->db->execute();
    }

    // Update non autorisé
    public function update(int $id, stdClass $fields): bool
    {
        return false;
    }

}