<?php

namespace Models;

class Search extends BaseModel
{
    public function getAllUsersFromPseudo(string $mot)
    {
        $this->db->query("SELECT * FROM user WHERE user.pseudo LIKE CONCAT('%',:mot,'%') ");
        $this->db->bind(':mot', $mot);
        return $this->db->fetchAll();
    }
}
