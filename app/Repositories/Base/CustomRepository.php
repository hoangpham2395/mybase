<?php 
namespace App\Repositories\Base;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityUpdated;

/**
 * 
 */
class CustomRepository extends BaseRepository
{
	function model() 
	{
		return "";
	}

	protected $_sortField;
	protected $_sortType;
	protected $_perPage;

	public function setSortField($sortField) 
	{
		$this->_sortField = $sortField;
	}

	public function getSortField() 
	{
		return $this->_sortField;
	}

	public function setSortType($sortType) 
	{
		$this->_sortType = $sortType;
	}

	public function getSortType() 
	{
		return $this->_sortType;
	}

	public function setPerPage($perPage) 
	{
		$this->_perPage = $perPage;
	}

	public function getPerPage() 
	{
		return $this->_perPage;
	}

	public function getListForBackend($params = [])
	{
		// Serve pagination
		if (isset($params['page'])) {
			unset($params['page']);
		}
        // Get data
		return $this->scopeQuery(function ($query) use ($params) {
			$query = $query->orderBy($this->getSortField(), $this->getSortType());
			if (empty($params)) {
				return $query;
			}
			// Search
			foreach ($params as $key => $value) {
				$query = $query->where($key, 'LIKE', '%' . $value . '%');
			}
			return $query;
		})
		->paginate($this->getPerPage());
	}

	public function findById($id)
    {
        return $this->findWhere(['id' => $id])->first();
    }

	// Custom create form BaseRepository in L5
    public function create(array $attributes)
    {
        $model = $this->model->newInstance($attributes);
        $model->save();
        $this->resetModel();

        event(new RepositoryEntityCreated($this, $model));

        return $this->parserResult($model);
    }

    // Custom update form BaseRepository in L5
    public function update(array $attributes, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();
        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }
}

?>