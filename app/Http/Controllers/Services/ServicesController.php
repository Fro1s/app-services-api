<?php

namespace App\Http\Controllers\Services;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\DeleteServiceRequest;
use App\Http\Requests\Services\IndexServiceRequest;
use App\Http\Requests\Services\RestoreServiceRequest;
use App\Http\Requests\Services\ShowServiceRequest;
use App\Http\Requests\Services\StoreServiceRequest;
use App\Http\Requests\Services\UpdateServiceRequest;
use App\Services\Service\ServiceService;
use Throwable;

class ServicesController extends Controller
{
    public function __construct(protected ServiceService $serviceService) {}

    public function store(StoreServiceRequest $request)
    {
        try {
            $data = $this->serviceService->store($request->validated());
            return ReturnApi::success($data, 'Serviço criado com sucesso!', 201);
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao criar serviço!', $e->getCode() ?? 500);
        }
    }

    public function delete(DeleteServiceRequest $request)
    {
        try {
            $data = $this->serviceService->delete($request->validated());
            return ReturnApi::success($data, "Serviço deletado com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao deletar serviço!', $e->getCode() ?? 500);
        }
    }

    public function restore(RestoreServiceRequest $request)
    {
        try {
            $data = $this->serviceService->restore($request->validated());
            return ReturnApi::success($data, "Serviço restaurado com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao restaurar serviço!', $e->getCode() ?? 500);
        }
    }

    public function update(UpdateServiceRequest $request)
    {
        try {
            $data = $this->serviceService->update($request->validated(), $request->id);
            return ReturnApi::success($data, "Serviço atualizado com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao atualizar serviço!', $e->getCode() ?? 500);
        }
    }

    public function show(ShowServiceRequest $request)
    {
        try {
            $data = $this->serviceService->show($request->validated());
            return ReturnApi::success($data, "Serviço encontrado com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao encontrar serviço!', $e->getCode() ?? 500);
        }
    }

    public function index(IndexServiceRequest $request)
    {
        try {
            $data = $this->serviceService->index($request->validated());
            return ReturnApi::success($data, "Serviços encontrados com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao encontrar serviços!', $e->getCode() ?? 500);
        }
    }
}
