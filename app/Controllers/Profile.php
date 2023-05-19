<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Profile extends ResourceController
{
    public function __construct() {
        $this->userModel = new UserModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $id = session()->get('id');
        $user = $this->userModel->find($id);
        
        if (!$user) {
            throw new \Exception("Data not found!");   
        }
        
        echo view('profile/index', ["data" => $user]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {

    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {

    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {

    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if($this->request->getPost('password') == ''){
            $payload = [
                "name" => $this->request->getPost('name'),
                "email" => $this->request->getPost('email')
            ];
        }else{
            $payload = [
                "name" => $this->request->getPost('name'),
                "email" => $this->request->getPost('email'),
                "password" => md5($this->request->getPost('password'))
            ];
        }        

        $this->userModel->update($id, $payload);
        return redirect()->to('/profile');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {

    }

    public function add_comment()
    {

    }
}