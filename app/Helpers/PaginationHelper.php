<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

if (! function_exists('extractQueryFilters')) {
    /**
     * Global function to handle centralize keys for pagination
     *
     * @param Request $request
     * @param array $filterKeys
     * @return array
     */
    function extractQueryFilters(Request $request, array $filterKeys): array
    {
        $filters = $request->only($filterKeys);

        // we can also move 1 & 15 values in the env file.
        $currentPage = (int) $request->query('current_page', 1);
        $rowsPerPage = (int) $request->query('rows_per_page', 15);

        return [
            $filters,
            $rowsPerPage,
            [$rowsPerPage, ['*'], 'page', $currentPage],
        ];
    }
}

if (! function_exists('paginatedResponse')) {
    /**
     * Global function to handle centralize response for paginated lists
     *
     * @param LengthAwarePaginator $paginatedLists
     * @param int $rowsPerPage
     * @return array
     */
    function paginatedResponse(LengthAwarePaginator $paginatedLists, int $rowsPerPage): array
    {
        return [
            'items' => $paginatedLists->items(),
            'current_page' => $paginatedLists->currentPage(),
            'last_page' => $paginatedLists->lastPage(),
            'rows_per_page' => $rowsPerPage,
            'total' => $paginatedLists->total(),
        ];
    }
}
