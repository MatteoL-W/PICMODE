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

        if (isset($data->text, $data->idUser, $data->idPost)
            && is_string($data->text) && is_numeric($data->idUser)  && is_numeric($data->idPost)) {
            if (!$this->comment->create($data->text, $data->idUser, $data->idPost)) {
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

        if ($this->comment->update($id, $data)) {
            $this->read();
        }
    }

    public function getCommentsFromPost(int $id)
    {
        $comment=$this->comment->selectAllCommentsFromPost($id);
        return_json(json_encode($comment));
    }

    public function delete(int $id): void
    {
        if ($this->comment->delete($id)) {
            $this->read();
        }
    }
}