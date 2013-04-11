<?php
/**
 * Handles Meta elements for Head class
 * */
namespace no\malmanger\mjqm;

/**
 * HeadMeta simple class to handle meta elements for the header.
 * 
 * */
class HeadMeta extends Element {
    /**
     * ELEMENT_NAME
     * */
    const ELEMENT_NAME = 'meta';

    /**
     * $name is the name attribute of the meta element
     * */
    protected $name;
	/**
	 * $content is the content attribute of the meta element
	 * */
    protected $content;

    /**
     * Constructor for creating a new HeadMeta object
     * 
     * @param string $name The name of the meta element
     * @param string $content The content of the metaelement
     * */
    public function __construct($name, $content="") {
        $this->_element_name = self::ELEMENT_NAME;
        $this->name = $name;
        if(!(trim($content) == false)) {
        	$this->content = $content;
        }
    }
    /**
     * Sett the meta content
     * 
     * @param string $content The content of the metaelement
     * */
    public function setContent($content) {
        $this->content = $content;
    }
    /**
     * Get the content of the meta element 
     * 
     * @return string $content Returns the meta content.
     * */
    public function getContent() {
        return $this->content;
    }
    /**
     * Get the current meta element name attribute
     * 
     * @return string $name Returns the meta name.
     * */
    public function getName() {
        return $this->name;
    }

    /**
     * Get a string of attribute=value pairs
     * @return string $attributes String containing the attributes.
     * */
    public function attributes() {
        $attributes = " name=\"" . $this->getName() . "\"";
        if(strlen(trim($this->getContent()))>0) {
            $attributes .= " content=\"" . $this->getContent() . "\"";
        }

        $attributes .= parent::attributes();

        return $attributes;

    }

  //   /**
  //    * Get the current meta element
  //    * 
  //    * @return string $meta_element Returns the complete meta element.
  //    * */
  //   public function getMetaElement() {
  //   	$me = __FILE__ . '?' . __METHOD__;
  //   	$meta_element = "<meta name=\"" . $this->getName() . "\"";
  //   	if(strlen(trim($this->getContent()))>0) {
		// 	$meta_element .= " content=\"" . $this->getContent() . "\"";
		// }
		// $meta_element .= " />";
  //       return $meta_element;
  //   }
    
} // end of class HeadMeta

