<?php

namespace App\Http\Controllers\Authentication;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    /**
     * AuthController constructor.
     *
     * @param AuthService $authService The authentication service.
     */
    public function __construct(protected AuthService $authService)
    {
    }

    /**
     * Handle the login request.
     *
     * @param LoginRequest $request The login request.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     * @throws ApiException If an error occurs during login.
     */
    public function login(LoginRequest $request) 
    {
        try{
            $data = $this->authService->login($request->validated());
            return ReturnApi::success($data, 'Usuário logado com sucesso!');
        }catch (\Exception $e){
            throw new ApiException($e->getMessage() ?? 'Erro ao realizar login', $e->getCode() ?? 500);        
        }
    }
}