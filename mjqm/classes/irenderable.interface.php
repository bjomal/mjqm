<?php
/**
 * Interface for classes which is supposed to render a View.
 * */
namespace no\malmanger\mjqm;

/**
 * 
 * */
interface IRenderable {
	/**
	 * Call this to enable viewing of the class
	 * @param boolean $direct_output Wether output should be written to outputbuffer or returned as a string
	 * */
	public function render($direct_output);
}
