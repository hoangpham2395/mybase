<?php 

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Session;

/**
 * 
 */
class BackendController extends BaseController
{
	protected $_sortField = 'id';
    protected $_sortType = 'DESC';
    protected $_perPage = 10;

    public function __construct()
    {
    }

    protected function _prepareData()
    {
        return [];
    }

    protected function _prepareIndex()
    {
        $params['alias'] = $this->getAlias();
        return $params;
    }

    protected function _beforeIndex() 
    {
        $this->getRepository()->setSortField($this->_sortField);
        $this->getRepository()->setSortType($this->_sortType);
        $this->getRepository()->setPerPage($this->_perPage);
    }
	
	public function index() 
	{
		$this->_beforeIndex();
        $params = $this->_prepareIndex();
        $entities = $this->getRepository()->getListForBackend(Input::all());
        return view('backend.' . $this->getAlias() . '.index', compact('entities', 'params'));
	}

	public function show($id) 
	{

	}

	public function create() 
	{

	}

	public function edit($id) 
	{

	}

	public function store(Request $request) 
	{

	}

	public function update(Request $request, $id) 
	{

	}

	public function destroy($id) 
	{

	}
}
?>