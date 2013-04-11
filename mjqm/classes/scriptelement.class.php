<?php
/**
 * Handles Script elements
 * */
namespace no\malmanger\mjqm;

/**
 * HeadMeta simple class to handle script elements for the header.
 * 
 * */
class ScriptElement extends Element {
    /**
     * ELEMENT_NAME
     * */
    const ELEMENT_NAME = 'script';
    /**
     * DEFAULT_TYPE
     * */
    const DEFAULT_TYPE = 'text/javascript';



    /**
     * $src is the src attribute of the script element
     * */
    protected $_src = "";
	/**
	 * $type is the type attribute of the script element
	 * */
    protected $_type = "";
    /**
     * $_async is the async attribute of the script element
     * */
    protected $_async = "";
    /**
     * $_charset is the charset attribute of the script element
     * */
    protected $_charset = "";

    /**
     * Constructor for creating a new Headscript object
     * 
     * @param string $src = "" The src of the script element
     * @param string $type = "text/javascript" The type of the scriptelement
     * */
    public function __construct($src = "", $type = self::DEFAULT_TYPE) {

        if(strlen(trim($type)) > 0) {
            $this->setType($type);
        }
        if(strlen(trim($src)) > 0) {
            $this->setSrc($src);
        }

        //Call parent(Element) to set _element_name
        parent::__construct(self::ELEMENT_NAME);
    }
    /**
     * Set the script type
     * 
     * @param string $type The type of the scriptelement
     * */
    public function setType($type = self::DEFAULT_TYPE) {
        if(strlen(trim($type)) > 0) {
            $this->_type = $type;
        } else {
            $this->_type = "";
        }
    }
    /**
     * Get the type of the script element 
     * 
     * @return string $type Returns the script type.
     * */
    public function getType() {
        return $this->_type;
    }
    /**
     * Set the script src
     * 
     * @param string $src The src of the scriptelement
     * */
    public function setSrc($src = "") {
        if(strlen(trim($src)) > 0) {
            $this->_src = $src;
        } else {
            $this->_src = "";
        }
    }
    /**
     * Get the src of the script element 
     * 
     * @return string $src Returns the script src.
     * */
    public function getSrc() {
        return $this->_src;
    }
    /**
     * Set the script async
     * 
     * @param string $async The async of the scriptelement
     * */
    public function setAsync($async = true) {
        if($async) {
            $this->_async = "async";
        } else {
            $this->_async = "";
        }
    }
    /**
     * Get the async of the script element 
     * 
     * @return string $async Returns the script async.
     * */
    public function getAsync() {
        return $this->_async;
    }
    /**
     * Set the script charset
     * 
     * @param string $charset The charset of the scriptelement
     * */
    public function setCharset($charset = "UTF-8") {
        if(strlen(trim($charset)) > 0) {
            $this->_charset = $charset;
        } else {
            $this->_charset = "";
        }
    }
    /**
     * Get the charset of the script element 
     * 
     * @return string $charset Returns the script charset.
     * */
    public function getCharset() {
        return $this->_charset;
    }


    /**
     * Get a string of attribute=value pairs
     * @return string $attributes String containing the attributes.
     * */
    public function attributes() {
        $attributes = "";
        if(strlen(trim($this->getType()))>0) {
            $attributes .= " type=\"" . $this->getType() . "\"";
        }
        if(strlen(trim($this->getSrc()))>0) {
            $attributes .= " src=\"" . $this->getSrc() . "\"";
        }
        if(strlen(trim($this->getCharset()))>0) {
            $attributes .= " charset=\"" . $this->getCharset() . "\"";
        }
        if(strlen(trim($this->getAsync()))>0) {
            $attributes .= " async";
        }

        $attributes .= parent::attributes();

        return $attributes;

    }


  //   /**
  //    * Get the current script element
  //    * 
  //    * @return string $script_element Returns the complete script element.
  //    * */
  //   public function getscriptElement() {
  //   	$me = __FILE__ . '?' . __METHOD__;
  //   	$script_element = "<script name=\"" . $this->getName() . "\"";
  //   	if(strlen(trim($this->getType()))>0) {
		// 	$meta_element .= " type=\"" . $this->getType() . "\"";
		// }
		// $meta_element .= " />";
  //       return $meta_element;
  //   }
    
} // end of class HeadMeta

