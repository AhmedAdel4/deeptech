<?php

namespace App\Services;


use App\Repositories\UserRepositoryInterface;


class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

   
  
    public function index()
    {
        return $this->userRepository->paginate(20);
    }

    public function updateProfile($data)
    {
        return $this->userRepository->edit($data);
    }

    public function destroy($user)
    {
        $this->userRepository->delete($user);
    }

}


