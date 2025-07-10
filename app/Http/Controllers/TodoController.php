<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Repositories\TodoRepository;

class TodoController extends Controller
{
    public function __construct(
        private TodoRepository $todoRepository
    ) { }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        [$filters, $rowsPerPage, $paginate] = extractQueryFilters($request, ['title', 'completed']);

        $paginatedTodos = $this->todoRepository->filter($filters)->paginate(...$paginate);

        return successResponse('Todo lists!', paginatedResponse($paginatedTodos, $rowsPerPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = $this->todoRepository->create($request->validated());

        return successResponse("Todo with title of $todo->title successfully added!");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $this->todoRepository->update($todo->id, $request->validated());

        return successResponse("Todo with title of $todo->title successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $this->todoRepository->delete($todo->id);

        return successResponse("Todo with title of $todo->title successfully deleted!");
    }
}
