<?php 

namespace aCube\SmartUI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Illuminate\Html\FormBuilder
 */
class SmartForm extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'smartform'; }

}
