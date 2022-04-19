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

        return parent::createFromArray($values, $keys);
    }
}