<?php

namespace App\Services\User;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function delete($data)
    {
        User::find($data['id'])->delete();
        return User::onlyTrashed()->find(['id' => $data['id']])->first();
    }

    public function restore($data)
    {
        User::withTrashed()->find($data['id'])->restore();
        return User::find($data['id']);
    }

    public function update($data, $id)
    {
        $data['password'] = Hash::make($data['password']);
        User::where('id', $id)->update($data);
        return User::find($data['id']);
    }

    public function show(array $data): User
    {
        return User::find($data['id']);
    }

    public function index(array $data): object
    {
        return User::paginate($data['per_page'], ['*'], 'page', $data['page']);
    }
}
