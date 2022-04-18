<?php

namespace Models;

use stdClass;

class Following
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create(int $idFollower, int $idFollowing): bool
    {
        $this->db->query("INSERT INTO following (`idFollower`, `idFollowing`) VALUES (:idFollower, :idFollowing)");
        $this->db->bind(":idFollower", $idFollower);
        $this->db->bind(":idFollowing", $idFollowing);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function selectAll(): array
    {
        $this->db->query("SELECT * FROM following");
        return $this->db->fetchAll();
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

    public function delete(int $idFollower, int $idFollowing): bool
    {
        $this->db->query("DELETE FROM following WHERE idFollower = :idFollower AND idFollowing = :idFollowing");
        $this->db->bind(':idFollower', $idFollower);
        $this->db->bind(':idFollowing', $idFollowing);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

}