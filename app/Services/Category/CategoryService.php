<?php

namespace App\Services\Category;

use App\Models\Category;

class CategoryService 
{

    public function store($data)
    {
        return Category::create($data);
    }

    public function delete($data)
    {
        Category::find($data['id'])->delete();
        return Category::onlyTrashed()->find(['id' => $data['id']])->first();
    }

    public function restore($data)
    {
        Category::withTrashed()->find($data['id'])->restore();
        return Category::find($data['id']);
    }

    public function update($data, $id)
    {
        Category::where('id', $id)->update($data);
        return Category::find($data['id']);
    }

    public function show(array $data): Category
    {
        return Category::find($data['id']);
    }

    public function index(array $data): object
    {
        return Category::paginate($data['per_page'], ['*'], 'page', $data['page']);
    }
}