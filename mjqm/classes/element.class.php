<?php
/**
 * File for the Element class
 * 
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * Element class handles support for html elements.
 * 
 * */
class Element extends Chain implements IElement {
	const ELEMENT_CLOSED=1;
	const ELEMENT_START=2;
	const ELEMENT_EMPTY=3;
	const ELEMENT_CONTENT=4;
	const ELEMENT_END=0;
	/**
	 * array of custom 'overloaded' attributes.
	 * */
	protected $_customAttributes = array();
	/**
	 * array of classes.
	 * */
	protected $_classes = array();
	/**
	 * element id
	 * */
	protected $_id = "";
	/**
	 * element title
	 * */
	protected $_title = "";
	/**
	 * element content
	 * */
	protected $_content = array();

	/**
	 * string containing the name of the element
	 * 
	 * */
	protected $_element_name;
	/**
	 * Default constructor for new elements
	 * @param string $element_name Name of new element i.e. 'link' or 'div'
	 * */
	public function __construct( $element_name ) {
		$this->_element_name = $element_name;
	}
	/**
	 * Used to overload set Property
	 * @param string $name Name of property to set. 
	 * @param mixed $value The value to give the property
	 * */
	public function __set ( $name , $value ) {
		$name_case = arri_find_key($name, $this->_customAttributes);
		if ($name_case === false) {
			$this->_customAttributes[$name] = $value;
		} else {
			$this->_customAttributes[$name_case] = $value;
		}
	}
	/**
	 * Used to overload get Property
	 * @param string $name Name of property to set. 
	 * @return mixed $value for the spesified property $name.
	 * */
	public function __get ( $name ) {
		$name_case = arri_find_key($name, $this->_customAttributes);
		if ($name_case !== false) {
			return $this->_customAttributes[$name_case];
		} else {
			return false;
		}
	}
	/**
	 * Used to overload isset for selected Property
	 * @param string $name Name of property to check for. 
	 * @return boolean $isset true if propertyfor the spesified property $name.
	 * */
	public function __isset ( $name ) {
		$name_case = arri_find_key($name, $this->_customAttributes);
		if ($name_case !== false) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Unset the selected Property
	 * @param string $name Name of property to set. 
	 * */
	public function __unset ( $name ) {
		$name_case = arri_find_key($name, $this->_customAttributes);
		if ($name_case !== false) {
			unset($this->_customAttributes[$name_case]);
		}
	}

	/**
	 * add class to element
	 * @param string $classnames class('s) to add. Use space ' ' separated list of classnames
	 * */
	public function addClass( $classnames ) {
		$class_array = explode(' ', $classnames);
		foreach ($class_array as $value) {
			if(arri_find_value($value, $this->_classes) === false) {
				$this->_classes[] = $value;
			}
		}
	}
	/**
	 * remove class from element
	 * @param string $classnames class('s) to remove. Use space ' ' separated list of classnames
	 * */
	public function deleteClass( $classnames ) {
		$class_array = explode(' ', $classnames);
		foreach ($class_array as $key => $value) {
			$name_case = arri_find_value_get_key($value, $this->_customAttributes);
			if($name_case !== false) {
				unset($this->_classes[$name_case]);
			}
		}
	}
	/**
	 * clear list of classes for element
	 * */
	public function unsetClass() {
		unset($this->_classes);
		$this->_classes = array();
	}
	/**
	 * get classes for element
	 * @param boolean $return_array If classes should be returned as an array instead og a space separated string.
	 * @return string|array $classnames class('s) to add. Use space ' ' separated list of classnames
	 * */
	public function getClass( $return_array = false ) {
		if ($return_array) {
			return $this->_classes;
		} else {
			return implode(' ', $this->_classes);
		}
	}

	/**
	 * Set the ID attribute of the element
	 * @param string $id the ID to set
	 * */
	public function setId( $id ) {
		$this->_id = $id;
	}
	/**
	 * Remove the ID from the element
	 * 
	 * */
	public function unsetId() {
		$this->_id = "";
	}

	/**
	 * Add content to element
	 * @param string|array|Element $content the content to add.
	 * string is handled as pure text (html for output)
	 * Element is rendered with the element() method
	 * array's can contain string, Element og even more arrays
	 * */
	public function addContent( $content = null ) {
		if(!is_null($content)) {
			$this->_content[] = $content;	
		}
		
	}
	/**
	 * Remove the content from the element
	 * 
	 * */
	public function unaddContent() {
		$this->_content = array();
	}
	/**
	 * Get text content for the element
	 * @return array($content)
	 * */
	public function getContent() {
		return $this->_content;
	}

	/**
	 * Make a html representation for the content array
	 * @param array $contentList
	 * @return string $html 
	 * 
	 * */
	public function renderContent($contentList) {
		$me = __FILE__ . '?' . __METHOD__;
		Log::d(print_r($contentList, true), $me);
		$html = "";
		if(is_array($contentList)) {
			foreach($contentList as $content) {
				Log::d("__Looping content:" . print_r($content, true), $me);
				if(is_a($content, get_class(), false)) {
					$html .= $content->element();
				} elseif (is_array($content)) {
					$html .= renderContent($contentList);
				} else {
					$html .= $content;
				}
			}
		} else {
			$html = $contentList;
		}
		return $html;
	}

	/**
	 * Get the custom attributes defined
	 * @return array of $name -> $value pairs
	 * */
	public function customAttributes () {
		return $this->_customAttributes;
	}

	/**
	 * Get the start of the element including attributes
	 * @param boolean $closed = false If returned element should be closed immediately with ' />'
	 * @return string $openelement the starting '<element attribute="xx" ... >'
	 * */
	public function getOpenElement($closed = false) {
		$openelement = "<" . $this->_element_name;
		$openelement .= $this->attributes();
		if($closed !== false) {
			$openelement .= " />";
		} else {
			$openelement .= ">";
		}
		return $openelement;
	}
 
	/**
	 * Get the the closing html for the tag
	 * @return string '</element>'
	 * */
	public function getCloseElement () {
		return "</" . $this->_element_name . ">";
	}

	/**
	 * Get the complete element tag.
	 * @param int $complete =  self::ELEMETN_CONTENT is a complete element with
	 * The four alternatives for $complete is:<pre><code>
	 * A: CLOSED_ELEMENT
	 * &amp;lt;element attr="xx yy" /&amp;gt;
	 *
	 * B: START_ELEMENT
	 * &amp;lt;element attr="xx yy"&amp;gt;
	 *
	 * C: EMPTY_ELEMENT
	 * &amp;lt;element attr="xx yy"&amp;gt;&amp;lt;/element&amp;gt;
	 * 
	 * D: CONTENT_ELEMENT
	 * &amp;lt;element attr="xx yy"&amp;gt;
	 *    sss sss sss sss ldldldldl
	 *    kdl ølsdk ølskdøl sd ølsdkølsk
	 * aølskd ksa øasøl døla 
	 * &amp;lt;/element&amp;gt;</code></pre>
	 * @return the complete tag
	 * */
	public function element($complete = self::ELEMENT_CONTENT) {
		$element = "";
		$element .= $this->getOpenElement($complete == self::ELEMENT_CLOSED);

		if ($complete > self::ELEMENT_START) {
			if ($complete == self::ELEMENT_CONTENT) {
				$element .= $this->renderContent($this->getContent());
			}
			$element .= $this->getCloseElement();
		}

		return $element;
	}

	/**
	 * Get a string of attribute=value pairs
	 * If overloaded in subclasses you should do a '$attributes .= parent::attributes();' at the end
	 * @return string $attributes String containing the attributes.
	 * */
	public function attributes() {
		$attributes = "";
		// first get ID
		if(strlen(trim($this->_id))>0) {
			$attributes .= " id=\"" . $this->_id . "\""; 
		}

		// get classes
		$classes = implode(' ', $this->_classes);
		if(strlen(trim($classes))>0) {
			$attributes .= " class=\"" . trim($classes) . "\""; 
		}

		// get title
		if(strlen(trim($this->_title))>0) {
			$attributes .= " title=\"" . trim($this->_title) . "\""; 
		}

		// get custom attributes
		foreach($this->_customAttributes as $key => $value) {
			if((strlen(trim($key))>0)&&(strlen(trim($value))>0)) {
				$attributes .= " $key=\"" . $value . "\"";
			}
		}

		return $attributes;
	}

	/**
	 * Chainable version of adding classes.
	 * @param string|boolean $classnames The classes to add to element. False value (default) clears classes.
	 * */
	public function chain_classes($classnames = false) {
		if ($classnames !== false) {
			$this->addClass($classnames);
		} else {
			$this->unsetClass();
		}
	}
	/**
	 * Chainable version of setting id.
	 * @param string $id The id to set for element. Empty string removes id.
	 * */
	public function chain_id($id = "") {
		if ($id) {
			$this->setId($id);
		} else {
			$this->unsetId();
		}
	}

	/**
	 * Chainable version of setting content.
	 * @param string $content The content to add to element.
	 * */
	public function chain_content($content = null) {
		$this->addContent($content);
	}



}