<?php

namespace Controllers;

use DateTime;
use Models\Post;

class PostController
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function read(int $id = -1): void
    {
        if ($id === -1) {
            $post = $this->post->selectAll();
        } else {
            $post = $this->post->select($id);
        }

        return_json(json_encode($post));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->description, $data->picture, $data->date)
            && is_string($data->description) && is_string($data->picture) && DateTime::createFromFormat('Y-m-d', $data->date)) {
            if (!$this->post->create($data->description, $data->picture, $data->date)) {
                return;
            }
        } else {
            return;
        }

        $this->read();
    }

    public function update(int $id): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($this->post->update($id, $data)) {
            $this->read();
        }
    }

    public function delete(int $id): void
    {
        if ($this->post->delete($id)) {
            $this->read();
        }
    }
}