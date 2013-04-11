<?php
/**
 * File for Multipage class
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * Use this class to create a JQuery Mobile document with multiple pages
 * 
 * */
class Multipage extends BaseModel {

	/**
	 * @ignore 
	 * */
	protected $_head;
	/**
	 * @ignore 
	 * */
	protected $_header;
	/**
	 * @ignore 
	 * */
	protected $_footer;
	/**
	 * @ignore 
	 * */
	protected $_pages;

	/**
	 * @ignore 
	 * */
	function __construct() {
		// ensure config is run
		$this->_head = new Head();
		$this->_pages = array();

		$this->_head->title("Hello World Title!")->docType("html");
	}

	/**
	 * create new page 
	 * 
	 * @param string $id = '' set the id attribute of the page element
	 * @param string $data_theme = 'a' sets which theme-roller theme to use
	 * @return Page $new_page 
	 * */
	function newPage($name = '', $data_theme = 'a') {
		$new_page = new Page($name, $data_theme);
		$this->_pages[] = $new_page;
		return $new_page;
	}

	/**
	 * returns the head object of the page
	 * 
	 * @return object $_head 
	 * */
	function head() {
		return $this->_head;
	}
	/**
	 * returns the array of page objects
	 * 
	 * @return array $_pages 
	 * */
	function pages() {
		return $this->_pages;
	}
}
