<?php
/**
 * Modifier_highlight
 * Highlights text passed in from URL variable
 * 
 * @author  Fred LeBlanc
 * @author  Jack McDade
 * 
 * @link    https://github.com/statamic/highlight
 */
class Modifier_highlight extends Modifier
{
	public function index($value, $parameters=array())
	{
		$field        = $this->fetchConfig('get_variable');
		$start        = $this->fetchConfig('wrapping_element_start');
		$end          = $this->fetchConfig('wrapping_element_end');
		$field_value  = filter_input(INPUT_GET, $field, FILTER_SANITIZE_STRING);

		// no $field defined, abort
		if (!$field) {
			return $value;
		}
		
		// parse field
		$field_value = str_replace(array('.', '*'), array('\.', '\*'), $field_value);
		$field_value = join('|', preg_split('/\s+/i', $field_value));

		return preg_replace('/(' . $field_value . ')/i', $start . '$1' . $end, $value);
	}
}