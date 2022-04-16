<?php

namespace Models;

use stdClass;

class User
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create(string $pseudo, string $mail_address, string $password, string $date_of_birth, string $name, string $firstname, string $profile_picture): bool
    {
        $this->db->query("INSERT INTO user (`pseudo`, `mail_address`, `password`, `date_of_birth`, `name`, `firstname`, `profile_picture`) VALUES (:pseudo, :mail_address, :password, :date_of_birth, :name, :firstname, :profile_picture)");
        $this->db->bind(":pseudo", $pseudo);
        $this->db->bind(":mail_address", $mail_address);
        $this->db->bind(":password", $password);
        $this->db->bind(":date_of_birth", $date_of_birth);
        $this->db->bind(":name", $name);
        $this->db->bind(":firstname", $firstname);
        $this->db->bind(":profile_picture", $profile_picture);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function selectAll(): array
    {
        $this->db->query("SELECT * FROM user");
        return $this->db->fetchAll();
    }

    public function select(int $id)
    {
        $this->db->query("SELECT * FROM user WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function delete(int $id): bool
    {
        $this->db->query("DELETE FROM user WHERE id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function update(int $id, stdClass $fields): bool
    {
        $setValue = '';
        $i = 0;

        foreach ($fields as $name => $value) {
            $setValue .= "{$name} = '{$value}'";
            if ($i < count((array)$fields) - 1) {
                $setValue .= ', ';
            }
            $i++;
        }

        $this->db->query("UPDATE user SET $setValue WHERE id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }
}