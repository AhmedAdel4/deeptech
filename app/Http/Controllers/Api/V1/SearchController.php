<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SearchRequest;
use App\Http\Resources\ProjectResource;
use App\Services\SearchService;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Lang;

class SearchController extends Controller
{
    use ResponseTrait;
    protected $searchService;
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(SearchRequest $request)
    {
        $data = $this->searchService->search($request->validated());
        return $this->JsonResponse(200, ProjectResource::collection($data), Lang::get('lang.DataRetrieved'));
    }
}
