<?php

namespace App\Providers;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\AboutUsRepositoryInterface;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\BranchRepositoryInterface;
use App\Repositories\ContactUsRepositoryInterface;
use App\Repositories\ElementRepositoryInterface;
use App\Repositories\ElequentRepository\AboutUsRepository;
use App\Repositories\ElequentRepository\BlogRepository;
use App\Repositories\ElequentRepository\BranchRepository;
use App\Repositories\ElequentRepository\ContactUsRepository;
use App\Repositories\ElequentRepository\ElementRepository;
use App\Repositories\ElequentRepository\InfrastructureRepository;
use App\Repositories\ElequentRepository\PhilosophyRepository;
use App\Repositories\ElequentRepository\ProjectContactRepository;
use App\Repositories\ElequentRepository\ProjectRepository;
use App\Repositories\ElequentRepository\ReviewRepository;
use App\Repositories\ElequentRepository\SliderRepository;
use App\Repositories\ElequentRepository\TypeRepository;
use App\Repositories\ElequentRepository\UnitRepository;
use App\Repositories\ElequentRepository\UserRepository;
use App\Repositories\InfrastructureRepositoryInterface;
use App\Repositories\PhilosophyRepositoryInterface;
use App\Repositories\ProjectContactRepositoryInterface;
use App\Repositories\ProjectRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;
use App\Repositories\UnitRepositoryInterface;
use Illuminate\Support\ServiceProvider;




class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AboutUsRepositoryInterface::class, AboutUsRepository::class);
        $this->app->bind(ContactUsRepositoryInterface::class, ContactUsRepository::class);
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(TypeRepositoryInterface::class, TypeRepository::class);
        $this->app->bind(PhilosophyRepositoryInterface::class, PhilosophyRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(InfrastructureRepositoryInterface::class, InfrastructureRepository::class);
        $this->app->bind(UnitRepositoryInterface::class, UnitRepository::class);
        $this->app->bind(ElementRepositoryInterface::class, ElementRepository::class);
        $this->app->bind(ProjectContactRepositoryInterface::class, ProjectContactRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
  
    }
}
