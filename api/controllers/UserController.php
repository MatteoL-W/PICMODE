<?php

namespace Controllers;

use Models\User;

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

        if (isset($data->pseudo, $data->mail_address, $data->password, $data->date_of_birth, $data->name, $data->name, $data->firstname, $data->profile_picture)
            && is_string($data->pseudo) && is_string($data->mail_address) && is_string($data->password) && is_string($data->date_of_birth) && is_string($data->name) && is_string($data->firstname) && is_string($data->profile_picture)) {
            if (!$this->user->create($data->pseudo, $data->mail_address, $data->password, $data->date_of_birth, $data->name, $data->name, $data->firstname, $data->profile_picture)) {
                return;
            }
        } else {
            return;
        }

        UserController::read();
    }

    public function update(int $id): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($this->user->update($id, $data)) {
            UserController::read();
        }
    }

    public function delete(int $id): void
    {
        if ($this->user->delete($id)) {
            UserController::read();
        }
    }
}