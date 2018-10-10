<?php 
namespace App\Repositories\Base;

use Prettus\Repository\Eloquent\BaseRepository;

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
}

?>