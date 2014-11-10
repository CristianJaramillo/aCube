<?php 

namespace aCube\SmartUI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Illuminate\Html\FormBuilder
 */
class DataTable extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'datatable'; }

}
