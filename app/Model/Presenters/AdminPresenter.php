<?php 

namespace App\Model\Presenters;

trait AdminPresenter 
{
	public function getAvatar() 
	{
		if (!$this->avatar || !file_exists(asset($this->avatar))) {
			return '<img src="' . getNoImage() . '">';
		}
	}	
}
?>