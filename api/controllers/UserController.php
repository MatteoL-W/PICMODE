<?php

namespace Controllers;

use DateTime;
use Models\User;

include('../app/uploadHandler.php');

class UserController
{
    private User $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function read(int $id = -1): void
    {
        if ($id === -1) {
            $user = $this->user->selectAll();
        } else {
            $user = $this->user->select($id);
        }

        return_json(json_encode($user));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->pseudo, $data->mail_address, $data->password, $data->name, $data->name, $data->firstname, $data->profile_picture, $data->date_of_birth)
            && is_string($data->pseudo) && filter_var($data->mail_address, FILTER_VALIDATE_EMAIL) && is_string($data->password)
            && is_string($data->name) && is_string($data->firstname) && is_string($data->profile_picture) && DateTime::createFromFormat('Y-m-d', $data->date_of_birth)) {
            $uploadedImage = uploadImage($data->profile_picture, 'user/');
            $password = password_hash($data->password, PASSWORD_BCRYPT);
            if (!$this->user->create($data->pseudo, $data->mail_address, $password, $data->date_of_birth, $data->name, $data->firstname, $uploadedImage)) {
                return;
            }
        } else {
            return;
        }

        $this->read();
    }

    public function login(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->pseudo, $data->password)) {
            return_json(json_encode($this->user->login($data->pseudo, $data->password)));
        }
    }

    public function update(int $id): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($this->user->update($id, $data)) {
            $this->read();
        }
    }

    public function delete(int $id): void
    {
        if ($this->user->delete($id)) {
            $this->read();
        }
    }
}