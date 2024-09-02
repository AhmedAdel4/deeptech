<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;
use App\Http\Resources\BlogProjectsResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BrancheResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\LandingPageResource;
use App\Http\Resources\PhilosophyResource;
use App\Http\Resources\TypeResource;
use App\Services\BranchService;
use App\Services\LookupService;
use App\Traits\ResponseJson;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use stdClass;

class LookupController extends Controller
{
    use ResponseJson, ResponseTrait;
    protected $lookupService;
    protected $branchService;

    public function __construct(LookupService $lookupService, BranchService $branchService)
    {
        $this->lookupService = $lookupService;
        $this->branchService = $branchService;
    }

    public function lookup()
    {
        $lookups = $this->lookupService->lookup();
        return $this->JsonResponse(200, [
            'Blog' => $lookups['Blog'] ? new BlogResource($lookups['Blog']) : new stdClass(),
            'BlogProjects' => BlogProjectsResource::collection($lookups['BlogProjects']),
            'AboutUs' => $lookups['AboutUs'] ? new AboutUsResource($lookups['AboutUs']) : new stdClass(),
            'LandingPage' => LandingPageResource::collection($lookups['LandingPage']),
            'Branches' => BrancheResource::collection($lookups['Branches']),
            'ProjectTypes' => TypeResource::collection($lookups['ProjectTypes']),
            'Philosophy' => PhilosophyResource::collection($lookups['Philosophy']),

        ], Lang::get('lang.DataRetrieved'));
    }

    public function employees()
    {
        $data = $this->branchService->employees();
        return $this->JsonResponse(200, EmployeeResource::collection($data), Lang::get('lang.DataRetrieved'));
    }
    public function utilities()
    {
        $data = $this->lookupService->utilities();
        return $this->JsonResponse(200, $data, Lang::get('lang.DataRetrieved'));
    }
}
