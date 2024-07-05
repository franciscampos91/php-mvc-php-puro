<?php

class UserController extends RenderView
{

    public function index()
    {
        echo 'User Controller';
    }

    public function show($id)
    {
       $id_user = $id[0];

       $user = new UserModel();

        $this->loadView('users', ['user' => $user->fecthById($id_user)]);
    }
    
}