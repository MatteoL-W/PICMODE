<?php

namespace Controllers;

use Models\Tag;

class TagController
{
    private Tag $tag;

    public function __construct()
    {
        $this->tag = new Tag;
    }

    public function read(int $id = -1): void
    {
        if ($id === -1) {
            $tag = $this->tag->selectAll();
        } else {
            $tag = $this->tag->select($id);
        }

        return_json(json_encode($tag));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->name)
            && is_string($data->name)) {
            if (!$this->tag->create($data->name)) {
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

        if ($this->tag->update($id, $data)) {
            $this->read();
        }
    }

    public function delete(int $id): void
    {
        if ($this->tag->delete($id)) {
            $this->read();
        }
    }
}