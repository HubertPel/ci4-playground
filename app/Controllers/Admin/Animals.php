<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnimalModel;

class Animals extends BaseController
{
    protected AnimalModel $model;

    public function __construct()
    {
        $this->model = new AnimalModel();
    }

    public function index()
    {
        return view('admin/animals/index', [
            'animals' => $this->model->findAll(),
        ]);
    }

    public function deleted()
    {
        return view('admin/animals/deleted', [
            'animals' => $this->model->onlyDeleted()->findAll(),
        ]);
    }

    public function create()
    {
        return view('admin/animals/form');
    }

    public function store()
    {
        if (! $this->validate('animalCreate')) {
            return view('admin/animals/form', [
                'validation' => $this->validator,
            ]);
        }

        $this->model->insert($this->request->getPost([
            'name', 'species', 'age'
        ]));

        return redirect()->to('/admin/animals');
    }

    public function edit($id)
    {
        return view('admin/animals/form', [
            'animal' => $this->model->find($id),
        ]);
    }

    public function update($id)
    {
        if (! $this->validate('animalUpdate')) {
            return view('admin/animals/form', [
                'animal'     => $this->model->find($id),
                'validation' => $this->validator,
            ]);
        }

        $this->model->update($id, $this->request->getPost([
            'name', 'species', 'age'
        ]));

        return redirect()->to('/admin/animals');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/animals');
    }

    public function restore($id)
    {
        $this->model->update($id, ['deleted_at' => null]);
        return redirect()->to('/admin/animals/deleted');
    }
}
