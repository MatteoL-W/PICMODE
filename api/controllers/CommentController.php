<?php

namespace Controllers;

use Models\Comment;

class CommentController
{
    private Comment $comment;

    public function __construct()
    {
        $this->comment = new Comment;
    }

    public function read(int $id = -1): void
    {
        if ($id === -1) {
            $comment = $this->comment->selectAll();
        } else {
            $comment = $this->comment->select($id);
        }

        return_json(json_encode($comment));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->text)
            && is_string($data->text)) {
            if (!$this->comment->create($data->text)) {
                return;
            }
        } else {
            return;
        }

        CommentController::read();
    }

    public function update(int $id): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($this->comment->update($id, $data)) {
            CommentController::read();
        }
    }

    public function delete(int $id): void
    {
        if ($this->comment->delete($id)) {
            CommentController::read();
        }
    }
}