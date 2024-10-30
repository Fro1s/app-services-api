<?php

namespace App\Services\Service;

use App\Models\Service;
use App\Models\ServiceAvailability;

class ServiceService
{
    public function store($data)
    {
        $provider = auth()->user();

        $service = Service::create([
            'provider_id' => $provider->id,
            'category_id' => $data['categoryId'],
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
        ]);

        if (!empty($data['availability'])) {
            foreach ($data['availability'] as $availability) {
                ServiceAvailability::create([
                    'service_id' => $service->id,
                    'day_of_week' => $availability['dayOfWeek'],
                    'start_time' => $availability['startTime'],
                    'end_time' => $availability['endTime'],
                ]);
            }
        }

        return $service;
    }

    public function delete($data)
    {
        Service::find($data['id'])->delete();
        return Service::onlyTrashed()->find(['id' => $data['id']])->first();
    }

    public function restore($data)
    {
        Service::withTrashed()->find($data['id'])->restore();
        return Service::find($data['id']);
    }

    public function update($data, $id)
    {
        $service = Service::find($id);
        $service->update($data);

        if (!empty($data['availability'])) {
            $service->availabilities()->delete();
            foreach ($data['availability'] as $availability) {
                ServiceAvailability::create([
                    'service_id' => $service->id,
                    'day_of_week' => $availability['dayOfWeek'],
                    'start_time' => $availability['startTime'],
                    'end_time' => $availability['endTime'],
                ]);
            }
        }

        return $service;
    }

    public function show(array $data): Service
    {
        return Service::find($data['id']);
    }

    public function index(array $data): object
    {
        return Service::paginate($data['per_page'], ['*'], 'page', $data['page']);
    }
}
