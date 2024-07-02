<?php

namespace Nuazsa\Nuacof\Services;

use Nuazsa\Nuacof\Repositories\AdminRepository;

class AdminService
{
    protected $adminRepository;

    /**
     * Constructor for AdminAuthService.
     *
     * @param AdminRepository $AdminRepository The repository for admin authentication.
     */
    public function __construct()
    {
        $this->adminRepository = new AdminRepository;
    }

    public function getAdmin($id)
    {
        $id = $this->adminRepository->findById($id);
        return $id;
    }
}
