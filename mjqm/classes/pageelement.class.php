<?php
/**
 * File for PageElement class
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * Page class handles support for jquery-mobile page elements.
 * 
 * */
class PageElement extends JqmElement {


	/**
	 * Create the page object
	 * @param string $id = '' set the id attribute of the page element
	 * @param string $data_theme = self::DEFAULT_THEME sets which theme-roller theme to use
	 * */
	public function __construct($id = '', $data_theme = self::DEFAULT_THEME) {
		$this->setId($id);
	}

}

