<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PinModel; 
use App\Models\CommentModel; 

class Pin extends ResourceController
{
    public function __construct() {
        $this->pinModel = new PinModel();
        $this->commentModel = new CommentModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $id = session()->get('id');

        $pins = $this->pinModel->where('id_user', $id)->paginate(2, 'pins');

        $payload = [
            "pins" => $pins,
            "pager" => $this->pinModel->pager
        ];

        echo view('pin/index', $payload);
    }

    public function search(){
        $caption = $this->request->getPost('caption');

        $db      = \Config\Database::connect();
        $builder = $db->table('pins');
        $query = $builder->like('caption', $caption)->get()->getResultArray();

        $payload = [
            'query' => $query,
            'caption' => $caption
        ];

        echo view('search', $payload);

    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('comments');
        $builder->select('comments.comment');
        $builder->select('users.name');
        $builder->select('pins.caption', 'pins.location', 'pins.hashtag', 'pins.uploads');
        $builder->join('pins', 'comments.id_pin = pins.id');
        $builder->join('users', 'comments.id_user = users.id');
        $builder->where('id_pin', $id);
        $query = $builder->get()->getResultArray();

        $pin = $this->pinModel->where('id', $id)->first();

        $payload = [
            'pin' => $pin,
            'query' => $query
        ];

        echo view('pin/detail', $payload);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        echo view('pin/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {

        $fileName = "";

        $upload = $this->request->getFile('upload');

        if ($upload) {
            $fileName = $upload->getRandomName(); // Mendapatkan nama file baru secara acak

            $upload->move('uploads', $fileName); // Memindahkan file ke public/uploads dengan nama acak
        }

        $payload = [
            "caption" => $this->request->getPost('caption'),
            "location" => $this->request->getPost('location'),
            "hashtag" => $this->request->getPost('hashtag'),
            "upload" => $fileName, // Kita simpan nama filenya saja
            "id_user" => session()->get('id')
        ];

        $this->pinModel->insert($payload);
        return redirect()->to('/pin');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $pin = $this->pinModel->find($id);
        
        if (!$pin) {
            throw new \Exception("Data not found!");   
        }
        
        echo view('pin/edit', ["data" => $pin]);
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $fileName = "";

        $upload = $this->request->getFile('upload');

        if ($upload != '') {
            $fileName = $upload->getRandomName(); // Mendapatkan nama file baru secara acak

            $upload->move('uploads', $fileName); // Memindahkan file ke public/uploads dengan nama acak

            $payload = [
                "caption" => $this->request->getPost('caption'),
                "location" => $this->request->getPost('location'),
                "hashtag" => $this->request->getPost('hashtag'),
            "upload" => $fileName, // Kita simpan nama filenya saja
        ];
    }else{
        $payload = [
            "caption" => $this->request->getPost('caption'),
            "location" => $this->request->getPost('location'),
            "hashtag" => $this->request->getPost('hashtag')
        ];
    }



    $this->pinModel->update($id, $payload);
    return redirect()->to('/pin');
}

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->pinModel->delete($id);
        return redirect()->to('/pin');
    }

    public function add_comment(){
       $payload = [
        "id_pin" => $this->request->getPost('id'),
        "comment" => $this->request->getPost('comment'),
        "id_user" => session()->get('id')
    ];

    $this->commentModel->insert($payload);

    return redirect()->to('/pin/' . $this->request->getPost('id'));

}
}