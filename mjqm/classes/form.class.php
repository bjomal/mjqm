<?php
/**
 * File for Form class
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * Form class handles support for jquery-mobile pages.
 * 
 * */
class Form extends BaseModel {
	/**
	 * form element tag
	 * */
	protected $_form = null;
	/**
	 * form action attribute
	 * */
	protected $_action = null;
	/**
	 * form id attribute
	 * */
	protected $_id = null;
	/**
	 * form method attribute
	 * */
	protected $_method = null;

	/**
	 * form  content
	 * */
	protected $_content = null;



	/**
	 * Create the form object
	 * @param string $id = '' set the id attribute of the form element
	 * @param string $data_theme = 'a' sets which theme-roller theme to use
	 * */
	public function __construct($id = '', $action = '', $method = 'post', $data_theme = JqmElement::DEFAULT_THEME) {
		$this->_page = new JqmElement(JqmElement::DR_PAGE);

		$this->setId($id);
		$this->setAction($action);
		$this->setMethod($method);
		$this->setPageTheme($data_theme);
	}

	/** 
	 * set Form id
	 * @param string $id = ''
	 *
	 * */
	public function setId($id = '') {
		$this->_form->setId($id);
	}
	/** 
	 * get Form id
	 * @return string $id = ''
	 *
	 * */
	public function getId() {
		return $this->_form->getId($id);
	}
	/** 
	 * set Form action
	 * @param string $action = ''
	 *
	 * */
	public function setAction($action = '') {
		$this->_form->action = $action;
	}
	/** 
	 * set Form action
	 * @return string $action = ''
	 *
	 * */
	public function getAction() {
		return $this->_form->action;
	}
	/** 
	 * set Form method
	 * @param string $method = ''
	 *
	 * */
	public function setMethod($method = 'post') {
		$this->_form->method = $method;
	}
	/** 
	 * get Form method
	 * @return string $method = ''
	 *
	 * */
	public function getMethod() {
		return $this->_form->method;
	}

}
