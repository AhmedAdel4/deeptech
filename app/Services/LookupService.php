<?php

namespace App\Services;

use App\Models\BranchEmployee;
use App\Repositories\AboutUsRepositoryInterface;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\BranchRepositoryInterface;
use App\Repositories\PhilosophyRepositoryInterface;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;

class LookupService
{
    protected $aboutUsRepository;
    protected $sliderRepository;
    protected $branchRepository;
    protected $typeRepository;
    protected $philosophyRepository;
    protected $blogService;
    protected $projectService;


    public function __construct(
        AboutUsRepositoryInterface $aboutUsRepository,
        SliderRepositoryInterface $sliderRepository,
        BranchRepositoryInterface $branchRepository,
        TypeRepositoryInterface $typeRepository,
        PhilosophyRepositoryInterface $philosophyRepository,
        BlogService $blogService,
        ProjectService $projectService,

    ) {
        $this->aboutUsRepository = $aboutUsRepository;
        $this->sliderRepository = $sliderRepository;
        $this->branchRepository = $branchRepository;
        $this->typeRepository = $typeRepository;
        $this->philosophyRepository = $philosophyRepository;
        $this->blogService = $blogService;
        $this->projectService = $projectService;
  
    }

    public function lookup()
    {
        $data['Blog'] = $this->blogService->getBlogFront();
        $data['BlogProjects'] = $this->blogService->getProjects();
        $data['AboutUs'] = $this->aboutUsRepository->first();
        $data['LandingPage'] = $this->sliderRepository->all();
        $data['Branches'] = $this->branchRepository->all();
        $data['ProjectTypes'] = $this->typeRepository->all();
        $data['Philosophy'] = $this->philosophyRepository->all();

        return $data;
    }
    public function utilities()
    {
        $data['ProjectCount'] = $this->projectService->ProjectsCount();
        $data['EmployeesCount'] = BranchEmployee::count();
        return $data;
    }
}
