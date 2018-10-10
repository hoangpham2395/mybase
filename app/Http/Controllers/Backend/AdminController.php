<?php 

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BackendController;
use App\Repositories\AdminRepository;
use App\Validators\AdminValidator;
use App\Model\Entities\Admin;

/**
 * 
 */
class AdminController extends BackendController
{
	protected $alias = 'admin';

	public function __construct(AdminRepository $adminRepository, AdminValidator $adminValidator, Admin $admin) 
	{
		$this->setRepository($adminRepository);
		$this->setValidator($adminValidator);
		$this->setAlias($admin->getTable());
		parent::__construct();
	}
}

?>