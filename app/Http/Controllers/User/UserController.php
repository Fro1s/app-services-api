<?php

namespace App\Http\Controllers\User;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\IndexUserRequest;
use App\Http\Requests\User\RestoreUserRequest;
use App\Http\Requests\User\SendEmailRequest;
use App\Http\Requests\User\ShowUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Throwable;

class UserController extends Controller
{

    public function __construct(protected UserService $userService)
    {
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\ApiException
     */
    public function store(StoreUserRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->userService->store($request->validated());
            return ReturnApi::success($data, 'Usuário criado com sucesso!', 201);
        } catch (Throwable $e) {
            dd($e);
            throw new ApiException($e->getMessage() ?? 'Erro ao criar usuário!', $e->getCode() ?? 500);
        }
    }

    /**
     * Delete a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \App\Exceptions\ApiException
     */
    public function delete(DeleteUserRequest $request)
    {
        try {
            $data = $this->userService->delete($request->validated());
            return ReturnApi::success($data, "Usuário deletado com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao deletar usuário!', $e->getCode() ?? 500);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \App\Exceptions\ApiException
     */
    public function restore(RestoreUserRequest $request)
    {
        try {
            $data = $this->userService->restore($request->validated());
            return ReturnApi::success($data, "Usuário restaurado com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao restaurar usuário!', $e->getCode() ?? 500);
        }
    }

    /**
     * Update a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \App\Exceptions\ApiException
     */
    public function update(UpdateUserRequest $request)
    {
        try {
            $data = $this->userService->update($request->validated(), $request->id);
            return ReturnApi::success($data, "Usuário atualizado com sucesso!", 200);
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao atualizar usuário!', $e->getCode() ?? 500);
        }
    }

    /**
     * Show a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \App\Exceptions\ApiException
     */
    public function show(ShowUserRequest $request)
    {
        try {
            $data = $this->userService->show($request->validated());
            return ReturnApi::success($data, "Usuário listado com sucesso!", 200);
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao listar usuário!', $e->getCode() ?? 500);
        }
    }

    /**
     * Get a list of users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\ApiException
     */
    public function index(IndexUserRequest $request): JsonResponse
    {
        try {
            $data = $this->userService->index($request->validated());
            return ReturnApi::success($data, "Usuários listados com sucesso!", 200);
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao listar usuários!', $e->getCode() ?? 500);
        }
    }

}
