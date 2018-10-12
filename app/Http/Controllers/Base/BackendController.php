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
        $params['alias'] = $this->getAlias();
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
        $params = $this->_prepareEdit();
        $entity = $this->getRepository()->findById($id);
        return view('backend.' . $this->getAlias() . '.edit', compact(['entity', 'params']));
	}

	public function store(Request $request) 
	{
        $data = $request->all();

        // Validate
        $valid = $this->getValidator()->validateCreate($data);
        if (!$valid) {
            return redirect()->back()->withErrors($this->getValidator()->errors())->withInput();
        }

        // Create
        $data = array_merge($data, $this->_prepareStore());
        DB::beginTransaction();
        try {
            $this->getRepository()->create($data);
            DB::commit();
            Session::flash('success', getMessaage('create_success'));
            return redirect()->route($this->getAlias() . '.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        // Create failed
        return redirect()->route($this->getAlias() . '.index')->withErrors(['create_failed' => getMessaage('create_failed')]);
	}

	public function update(Request $request, $id) 
	{
        $data = $request->all();

        // Validate
        $valid = $this->getValidator()->validateUpdate($data, $id);
        if (!$valid) {
            return redirect()->back()->withErrors($this->getValidator()->errors())->withInput();
        }

        // Update
        $data = array_merge($data, $this->_prepareUpdate());
        DB::beginTransaction();
        try {
            $this->getRepository()->update($data, $id);
            DB::commit();
            Session::flash('success', getMessaage('update_success'));
            return redirect()->route($this->getAlias() . '.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
        // Update failed
        return redirect()->route($this->getAlias() . '.index')->withErrors(['update_failed' => getMessaage('update_failed')]);
	}

	public function destroy($id) 
	{

	}
}
?>