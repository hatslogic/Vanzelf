<?php

/**
 * @author OnTheGo Systems
 *
 * The following method can be used as REST arguments validation callback
 */
class WPML_REST_Arguments_Validation {

	/**
	 *@param mixed $value
	 *
	 * @return bool
	 */
	static function boolean( $value ) {
		return null !== filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE );
	}

	/**
	 *@param mixed $value
	 *
	 * @return bool
	 */
	static function integer( $value ) {
		return false !== filter_var( $value, FILTER_VALIDATE_INT );
	}

	/**
	 *@param mixed $value
	 *
	 * @return bool
	 */
	static function float( $value ) {
		return false !== filter_var( $value, FILTER_VALIDATE_FLOAT );
	}

	/**
	 *@param mixed $value
	 *
	 * @return bool
	 */
	static function url( $value ) {
		return false !== filter_var( $value, FILTER_VALIDATE_URL );
	}

	/**
	 *@param mixed $value
	 *
	 * @return bool
	 */
	static function email( $value ) {
		return false !== filter_var( $value, FILTER_VALIDATE_EMAIL );
	}

	/**
	 *@param mixed $value
	 *
	 * @return bool
	 */
	static function is_array( $value ) {
		return is_array( $value );
	}

	/**
	 * @param mixed $value
	 *
	 * @return bool
	 */
	static function date( $value ) {
		try {
			$d = new DateTime( $value );

			return $d && $d->format( 'Y-m-d' ) == $value;
		} catch ( Exception $e ) {
			return false;
		}
	}
}
