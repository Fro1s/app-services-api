<?php

namespace App\Http\Controllers\Category;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\IndexCategoryRequest;
use App\Http\Requests\Category\RestoreCategoryRequest;
use App\Http\Requests\Category\ShowCategoryRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Services\Category\CategoryService;
use Throwable;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService) {}

    public function store(StoreCategoryRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->categoryService->store($request->validated());
            return ReturnApi::success($data, 'Categoria criada com sucesso!', 201);
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao criar categoria!', $e->getCode() ?? 500);
        }
    }

    public function delete(DeleteCategoryRequest $request)
    {
        try {
            $data = $this->categoryService->delete($request->validated());
            return ReturnApi::success($data, "Categoria deletada com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao deletar categoria!', $e->getCode() ?? 500);
        }
    }

    public function restore(RestoreCategoryRequest $request)
    {
        try {
            $data = $this->categoryService->restore($request->validated());
            return ReturnApi::success($data, "Categoria restaurada com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao restaurar categoria!', $e->getCode() ?? 500);
        }
    }

    public function update(UpdateCategoryRequest $request)
    {
        try {
            $data = $this->categoryService->update($request->validated(), $request->id);
            return ReturnApi::success($data, "Categoria atualizada com sucesso!", 200);
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao atualizar categoria!', $e->getCode() ?? 500);
        }
    }

    public function show(ShowCategoryRequest $request)
    {
        try {
            $data = $this->categoryService->show($request->validated());
            return ReturnApi::success($data, "Categoria encontrada com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao encontrar categoria!', $e->getCode() ?? 500);
        }
    }

    public function index(IndexCategoryRequest $request)
    {
        try {
            $data = $this->categoryService->index($request->validated());
            return ReturnApi::success($data, "Categorias encontradas com sucesso!");
        } catch (Throwable $e) {
            throw new ApiException($e->getMessage() ?? 'Erro ao encontrar categorias!', $e->getCode() ?? 500);
        }
    }
}
