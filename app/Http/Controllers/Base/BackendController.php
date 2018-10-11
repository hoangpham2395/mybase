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
        $this->getRepository()->setSortField($this->_sortField);
        $this->getRepository()->setSortType($this->_sortType);
        $this->getRepository()->setPerPage($this->_perPage);
    }

    protected function _prepareData()
    {
        $params['alias'] = $this->getAlias();
        return $params;
    }

    protected function _prepareIndex()
    {
        $params = [];
        $params = array_merge($params, $this->_prepareData());
        return $params;
    }

    protected function _prepareCreate()
    {
        $params = [];
        $params = array_merge($params, $this->_prepareData());
        return $params;
    }

    protected function _prepareEdit()
    {
        $params = [];
        $params = array_merge($params, $this->_prepareData());
        return $params;
    }

    protected function _prepareStore()
    {
        $params['ins_id'] = 1;
        return $params;
    }

    protected function _prepareUpdate()
    {
        $params['upd_id'] = 1;
        return $params;
    }

	public function index() 
	{
        $params = $this->_prepareIndex();
        $entities = $this->getRepository()->getListForBackend(Input::all());
        return view('backend.' . $this->getAlias() . '.index', compact('entities', 'params'));
	}

	public function show($id) 
	{

	}

	public function create() 
	{
	    $params = $this->_prepareCreate();
	    return view('backend.' . $this->getAlias() . '.create', compact('params'));
	}

	public function edit($id) 
	{

	}

	public function store(Request $request) 
	{
        $data = $request->all();

        // Validate
        $valid = $this->getValidator()->validateCreate($data);
        if (!$valid) {
            return redirect()->back()->withErrors($this->getValidator()->errors())->withInput();
        }

        // Insert
        $data = array_merge($data, $this->_prepareStore());
        $this->getRepository()->create($data);
        Session::flash('create_success', getMessaage('create_success'));
        return redirect()->route($this->getAlias() . '.index');
	}

	public function update(Request $request, $id) 
	{

	}

	public function destroy($id) 
	{

	}
}
?>