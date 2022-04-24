<?php

namespace Models;

class User extends BaseModel
// Méthodes selectAll, select, update, delete dans BaseModel.php
{
    public string $entity = 'user';

    public function create(string $pseudo, string $mail_address, string $password, string $date_of_birth, string $name, string $firstname, string $profile_picture): bool
    {
        $values = [$pseudo, $mail_address, $password, $date_of_birth, $name, $firstname, $profile_picture];
        $keys = ['pseudo', 'mail_address', 'password', 'date_of_birth', 'name', 'firstname', 'profile_picture'];

        return $this->createFromArray($values, $keys);
    }

    public function login(string $pseudo, string $password) : int {
        $this->db->query("SELECT * FROM user WHERE pseudo=:pseudo OR mail_address=:pseudo");
        $this->db->bind(':pseudo', $pseudo);

        $result = $this->db->fetch();

        if (!$result) {
            return false;
        }

        if (password_verify($password, $result->password)) {
            return $result->id;
        }

        return false;
    }
}