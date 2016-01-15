<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 04-Jan-16
 * Time: 12:56
 */

namespace CodeCommerce\Http\Types;

use Mockery\Matcher\Type;


class AbstractType {
	/**
	 * @param $data
	 */
	public function import( $data ) {
		$classAttributes = get_class_vars( get_class( $this ) );
		if ( count( $classAttributes ) ) {
			foreach( $classAttributes as $eachKey => $eachValue ) {
				if ( isset( $data->$eachKey ) ){
					if ( in_array( 'set' . $eachKey, array_map( 'strtolower', get_class_methods( get_class( $this ) ) ) ) ) {
						$method = 'set' . ucfirst( $eachKey );
						$this->$method( $data->$eachKey );
					}
				}
			}
		}
	}

	/**
	 * @return Type
	 */
	public function getData() {
		$type = new Type();
		$classAttributes = get_class_vars( get_class( $this ) );
		if ( count( $classAttributes ) ) {
			foreach ( $classAttributes as $eachKey => $eachVal ) {
				$method = 'get' . ucfirst( $eachKey );
				$type->$eachKey = $this->$method();
			}
		}

		return $type;
	}
}