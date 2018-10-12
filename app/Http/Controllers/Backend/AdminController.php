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
	public function __construct(AdminRepository $adminRepository, AdminValidator $adminValidator, Admin $admin) 
	{
		$this->setRepository($adminRepository);
		$this->setValidator($adminValidator);
		$this->setAlias($admin->getTable());
		parent::__construct();
	}

	protected function _prepareCreate()
    {
        $params['role_type'] = getConfig('role_type');
        $params = array_merge($params, parent::_prepareCreate());
        return $params;
    }

    protected function _prepareEdit()
    {
        $params['role_type'] = getConfig('role_type');
        $params = array_merge($params, parent::_prepareEdit());
        return $params;
    }
}

?>