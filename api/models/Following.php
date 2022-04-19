<?php

namespace Models;

class Following extends BaseModel
// Méthodes selectAll, select, update, delete dans BaseModel.php
{
    public string $entity = 'user';

    public function create(int $idFollower, int $idFollowing): bool
    {
        $values = [$idFollower, $idFollowing];
        $keys = ['idFollower', 'idFollowing'];

        return parent::createFromArray($values, $keys);
    }

    public function selectAllFollowersFromUserId(int $idUser)
    {
        $this->db->query("SELECT * FROM following WHERE idFollowing = :id");
        $this->db->bind(':id', $idUser);
        return $this->db->fetchAll();
    }

    public function selectAllFollowingFromUserId(int $idUser)
    {
        $this->db->query("SELECT * FROM following WHERE idFollower = :id");
        $this->db->bind(':id', $idUser);
        return $this->db->fetchAll();
    }

    public function countFollowersFromUserId(int $idUser)
    {
        $this->db->query("SELECT COUNT(*) FROM following WHERE idFollowing = :id");
        $this->db->bind(':id', $idUser);
        return $this->db->fetch();
    }

    public function countFollowingFromUserId(int $idUser)
    {
        $this->db->query("SELECT COUNT(*) FROM following WHERE idFollower = :id");
        $this->db->bind(':id', $idUser);
        return $this->db->fetch();
    }

    // On override la fonction déjà présente dans BaseModel.php
    public function delete(int $id, int $idFollowing = -1): bool
    {
        $this->db->query("DELETE FROM following WHERE idFollower = :idFollower AND idFollowing = :idFollowing");
        $this->db->bind(':idFollower', $id);
        $this->db->bind(':idFollowing', $idFollowing);

        return $this->db->execute();
    }

}