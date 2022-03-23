<?php

namespace Controllers;

class ExampleController
{
    public function create() {
        var_dump("get");
        //view('example/create', []);
    }

    public function create_treatment() {
        var_dump("post");
    }

    public function update(int $id) {
        var_dump("get");
        //view('example/update', []);
    }

    public function update_treatment(int $id) {
        var_dump("post");
        //view('example/update', []);
    }

    public function delete(int $id) {
        var_dump("get");
        //view('example/delete', []);
    }

    public function delete_treatment(int $id) {
        var_dump("post");
        //view('example/delete', []);
    }


    public function read() {
        var_dump("read");
        //view('example/read', []);
    }
}