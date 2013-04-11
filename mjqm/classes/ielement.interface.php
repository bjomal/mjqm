<?php
/**
 * IElement interface
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * The interface for all objects that should handle html elements
 * 
 * */
interface IElement {
	/**
	 * Default constructor for new elements
	 * @param string $element_name Name of new element i.e. 'link' or 'div'
	 * */
	public function __construct( $element_name );
	/**
	 * Used to overload set Property
	 * @param string $name Name of property to set. 
	 * @param mixed $value The value to give the property
	 * */
	public function __set( $name , $value );
	/**
	 * Used to overload get Property
	 * @param string $name Name of property to set. 
	 * @return mixed $value for the spesified property $name.
	 * */
	public function __get( $name );
	/**
	 * Used to overload isset for selected Property
	 * @param string $name Name of property to check for. 
	 * @return boolean $isset true if propertyfor the spesified property $name.
	 * */
	public function __isset( $name );
	/**
	 * Unset the selected Property
	 * @param string $name Name of property to set. 
	 * */
	public function __unset( $name );
	/**
	 * add class to element
	 * @param string $classnames class('s) to add. Use space ' ' separated list of classnames
	 * */
	public function addClass( $classnames );
	/**
	 * remove class from element
	 * @param string $classnames class('s) to remove. Use space ' ' separated list of classnames
	 * */
	public function deleteClass( $classnames );
	/**
	 * clear list of classes for element
	 * */
	public function unsetClass();
	/**
	 * get classes for element
	 * @param boolean $return_array If classes should be returned as an array instead og a space separated string.
	 * @return string|array $classnames class('s) to add. Use space ' ' separated list of classnames
	 * */
	public function getClass( $return_array = false );
	/**
	 * Set the ID attribute of the element
	 * @param string $id the ID to set
	 * */
	public function setId( $id );
	/**
	 * Remove the ID from the element
	 * 
	 * */
	public function unsetId();
	/**
	 * Get the complete element tag.
	 * @param boolean $closed = false Set to true to close with a ' />'
	 * */
	public function element($closed = false);
	/**
	 * Get a string of attribute=value pairs
	 * If overloaded in subclasses you should do a '$attributes .= parent::attributes();' at the end
	 * @return string $attributes String containing the attributes.
	 * */
	public function attributes();


}
