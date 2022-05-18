<?php

namespace Models;

use stdClass;

class Following extends BaseModel
// Méthodes selectAll, select, update, delete dans BaseModel.php
{
    public string $entity = 'following';

    public function create(int $idFollower, int $idFollowing): bool
    {
        $values = [$idFollower, $idFollowing];
        $keys = ['idFollower', 'idFollowing'];

        return $this->createFromArray($values, $keys);
    }

    public function selectAllFollowersFromUserId(int $idUser)
    {
        $this->db->query("SELECT user.pseudo, user.name, user.firstname, user.profile_picture, user.id FROM following JOIN user ON user.id = idFollower WHERE idFollowing = :id");
        $this->db->bind(':id', $idUser);
        return $this->db->fetchAll();
    }

    public function selectAllFollowingFromUserId(int $idUser)
    {
        $this->db->query("SELECT user.pseudo, user.name, user.firstname, user.profile_picture FROM following JOIN user ON user.id = idFollowing WHERE idFollower = :id");
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

    // Update non autorisé
    public function update(int $id, stdClass $fields): bool
    {
        return false;
    }

}