<?php 

namespace App\Model\Presenters;

trait AdminPresenter 
{
	public function getAvatar() 
	{
	    $input = '<img src="';
		$url = (!$this->avatar || !file_exists(asset($this->avatar))) ? getNoImage() : asset($this->avatar);
		$input .= $url . '" height="100">';
		return $input;
	}	
}
?>