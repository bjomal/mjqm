<?php
/**
 * IChainable interface
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * The interface for all objects that should support to be chainable. All?
 * 
 * */
interface IChainable {
	/**
	 * Used to overload function calls
	 * @param string $name Name of function that is called
	 * @param array $arguments Array of arguments passed to the function
	 * @return object $this Object that the function resides in.
	 * */
	public function __call($name, array $arguments);
}
