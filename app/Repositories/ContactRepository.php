<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $contacts = $this->model->paginate(10);
        return $contacts;
    }
    public function create(array $data)
    {
        $contact = $this->model->create($data);
        $contact->save();
    }

    public function getById($id)
    {
        $contact = $this->model->where('id', $id)->first();
        return $contact;
    }
    public function search($term)
    {
        return $this->model
            ->where('name', 'LIKE', "%$term%")
            ->orWhere('email', 'LIKE', "%$term%")
            ->orWhere('phone', 'LIKE', "%$term%")
            ->paginate(10);
    }


    public function update(array $data, $id)
    {
        $this->model->where('id', $id)->update($data);
    }

    public function remove($id)
    {
        $this->model->where('id', $id)->delete();
    }
}
