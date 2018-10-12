<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

/**
 * 
 */
class BaseController extends Controller
{
	protected $_alias;
	protected $_reposiroty;
    protected $_validator;

    public function setRepository($repository) 
    {
    	$this->_reposiroty = $repository;
    }

    public function getRepository() 
    {
    	return $this->_reposiroty;
    }

    public function setValidator($validator) 
    {
        $this->_validator = $validator;
    }

    public function getValidator() 
    {
        return $this->_validator;
    }

    public function setAlias($alias) 
    {
        $this->_alias = $alias;
    }

    public function getAlias() 
    {
        return $this->_alias;
    }

    public function uploadToTmp($fileName, $link) 
    {
        Storage::disks('tmp')->put($fileName, $link);
    }
}

?>