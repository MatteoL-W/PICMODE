<?php

namespace Controllers;

use Models\Like;

class LikeController
{
    private Like $like;

    public function __construct()
    {
        $this->like = new Like;
    }

    public function read(): void
    {
        $all = $this->like->selectAll();
        return_json(json_encode($all));
    }

    public function getLikes(int $id)
    {
        $likes = $this->like->selectAllLikesOfUser($id);
        return_json(json_encode($likes));
    }

    public function getLikers(int $id)
    {
        $liker = $this->like->selectAllLikersFromPost($id);
        return_json(json_encode($liker));
    }

    public function countLikes(int $id)
    {
        $likes = $this->like->countLikesOfUser($id);
        return_json(json_encode($likes));
    }

    public function countLikers(int $id)
    {
        $likers = $this->like->countLikersFromPost($id);
        return_json(json_encode($likers));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->idUser, $data->idPost)
            && is_numeric($data->idUser) && is_numeric($data->idPost)) {
            if (!$this->like->create($data->idUser, $data->idPost)) {
                return;
            }
        } else {
            return;
        }

        $this->read();
    }

    public function delete(int $id, int $id2): void
    {
        if ($this->like->delete($id, $id2)) {
            $this->read();
        }
    }
}



