<?php

namespace Controllers;

use DateTime;
use Models\Post;

include('../app/uploadHandler.php');

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

    public function getAllPostsFromUserId(int $id)
    {
        $post=$this->post->selectAllPostsFromUserId($id);
        return_json(json_encode($post));
    }

    public function countPosts(int $id)
    {
        $post=$this->post->countPostsFromUserId($id);
        return_json(json_encode($post));
    }

    public function getAllPosts()
    {
        $post=$this->post->selectAllPostsWithUsers();
        return_json(json_encode($post));
    }

    public function getLoggedPosts(int $id)
    {
        $post=$this->post->selectAllFollowedPostsFromLoggedUser($id);
        return_json(json_encode($post));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->description, $data->picture, $data->date, $data->idUser)
            && is_string($data->description) && is_string($data->picture) && is_numeric($data->idUser) && DateTime::createFromFormat('Y-m-d', $data->date)) {
            $uploadedImage = uploadImage($data->picture, 'post/');
            if (!$this->post->create($data->description, $uploadedImage, $data->date, $data->idUser)) {
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