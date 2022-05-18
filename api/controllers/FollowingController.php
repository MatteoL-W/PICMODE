<?php

namespace Controllers;

use Models\Following;

class FollowingController
{
    private Following $following;

    public function __construct()
    {
        $this->following = new Following;
    }

    public function read(): void
    {
        $all = $this->following->selectAll();
        return_json(json_encode($all));
    }

    public function getFollowers(int $id)
    {
        $followers = $this->following->selectAllFollowersFromUserId($id);
        return_json(json_encode($followers));
    }

    public function getFollowing(int $id)
    {
        $following = $this->following->selectAllFollowingFromUserId($id);
        return_json(json_encode($following));
    }

    public function countFollowers(int $id)
    {
        $followers = $this->following->countFollowersFromUserId($id);
        return_json(json_encode($followers));
    }

    public function countFollowing(int $id)
    {
        $following = $this->following->countFollowingFromUserId($id);
        return_json(json_encode($following));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->idFollower, $data->idFollowing)
            && is_numeric($data->idFollower) && is_numeric($data->idFollowing)) {
            if (!$this->following->create($data->idFollower, $data->idFollowing)) {
                return;
            }
        } else {
            return;
        }

        $this->read();
    }

    public function delete(int $id, int $id2): void
    {
        if ($this->following->delete($id, $id2)) {
            $this->read();
        }
    }
}