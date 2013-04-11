<?php
/**
 * Handles Link elements for Head class
 *  
 * */
namespace no\malmanger\mjqm;

/**
 * HeadLink simple class to handle link elements in the header.
 * 
 * */
class HeadLink extends Element {
	/**
	 * DEFAULT_SIZES
	 * */
    const DEFAULT_SIZES = '48x48';
    /**
     * ELEMENT_NAME
     * */
    const ELEMENT_NAME = 'link';
	/**
	 * $_href is the href attribute of the link element
	 * */
    protected $_href = "";
	/**
	 * $_media is the media attribute of the link element
	 * */
    protected $_media = "";
	/**
	 * $_rel is the rel attribute of the link element
	 * */
    protected $_rel = "";
	/**
	 * $_type is the rel attribute of the link element
	 * */
    protected $_type = "";
	/**
	 * $_sizes is the sizes attribute of the link element
	 * */
    protected $_sizes = "";
	/**
	 * $_custom contains custom attributes for this element
	 * */
    protected $_custom = "";

    /**
     * Constructor for creating a new HeadLink object
     * 
     * @param string $rel The rel of the meta element
     * @param string $href The href of the metaelement
     * @param string $type The mime-type of the linked dokument
     * @param string $sizes = "48x48" The expected size of icon
     * */
    public function __construct($rel, $href="", $type="", $sizes=self::DEFAULT_SIZES) {
        $this->_element_name = self::ELEMENT_NAME;
        $this->_rel = $rel;
        if(strpos($rel, 'icon') !== false) {
        	$this->setSizes($sizes);
        }
        
        if(strlen(trim($type)) > 0) {
        	$this->setType($type);
        }
        if(strlen(trim($href)) > 0) {
        	$this->setHref($href);
        }
    }
    /**
     * Set the meta href
     * 
     * @param string $href The href of the link element
     * */
    public function setHref($href) {
        $this->_href = $href;
    }
    /**
     * Get the href of the meta element 
     * 
     * @return string $href Returns the meta href.
     * */
    public function getHref() {
        return $this->_href;
    }
    /**
     * Set the meta media
     * 
     * @param string $media The media of the link element
     * */
    public function setMedia($media) {
        $this->_media = $media;
    }
    /**
     * Get the media of the meta element 
     * 
     * @return string $media Returns the meta media.
     * */
    public function getMedia() {
        return $this->_media;
    }
    /**
     * Set the meta rel
     * 
     * @param string $rel The rel of the link element
     * */
    public function setRel($rel) {
        $this->_rel = $rel;
    }
    /**
     * Get the rel of the meta element 
     * 
     * @return string $rel Returns the meta rel.
     * */
    public function getRel() {
        return $this->_rel;
    }
    /**
     * Set the meta type
     * 
     * @param string $type The type of the link element
     * */
    public function setType($type) {
        	$this->_type = $type;
    }
    /**
     * Get the type of the meta element 
     * 
     * @return string $type Returns the meta type.
     * */
    public function getType() {
        return $this->_type;
    }
    /**
     * Set the meta sizes
     * 
     * @param string $sizes = "48x48" The sizes of the link element
     * */
    public function setSizes($sizes = self::DEFAULT_SIZES) {
        $this->_sizes = $sizes;
    }
    /**
     * Get the sizes of the meta element 
     * 
     * @return string $sizes Returns the meta sizes.
     * */
    public function getSizes() {
        return $this->_sizes;
    }

    /**
     * Set the link extra attributes
     * 
     * @param string $custom = "" The custom of the link element
     * */
    public function setCustom($custom = '') {
        $this->_custom = $custom;
    }
    /**
     * Get the custom of the meta element 
     * 
     * @return string $custom Returns the meta custom.
     * */
    public function getCustom() {
        return $this->_custom;
    }


    /**
     * Get a string of attribute=value pairs
     * @return string $attributes String containing the attributes.
     * */
    public function attributes() {
        $attributes = " rel=\"" . $this->getRel() . "\"";
        if(strpos($this->getRel(), 'icon') !== false && strlen(trim($this->getSizes())) > 0) {
            $attributes .= " sizes=\"" . $this->getSizes() . "\"";
        } else {
            if(strlen(trim($this->getSizes())) > 0) {
                Log::w("The \<link\> attribute 'sizes' is not needed when rel=\"" . $this->getRel() . "\"", $me);
                $attributes .= " sizes=\"" . $this->getSizes() . "\"";
            }
        }

        if(strpos($this->getRel(), 'icon') === false && strlen(trim($this->getType())) > 0) {
            $attributes .= " type=\"" . $this->getType() . "\"";
        } else {
            if(strlen(trim($this->getType())) > 0) {
                Log::w("The \<link\> attribute 'type' is not needed when rel=\"" . $this->getRel() . "\"", $me);
                $attributes .= " type=\"" . $this->getType() . "\"";
            }
        }

        if(strlen(trim($this->getHref())) > 0) {
            $attributes .= " href=\"" . $this->getHref() . "\"";
        }

        $attributes .= parent::attributes();

        return $attributes;

    }

    // /**
    //  * Get the complete link element from object
    //  * 
    //  * @return string $link_element Returns the link element.
    //  * */
    // public function getLinkElement() {
    // 	$me = __FILE__ . '?' . __METHOD__;

    // 	$link_element = "<link rel=\"" . $this->getRel() . "\"";
    // 	if(strpos($this->getRel(), 'icon') !== false && strlen(trim($this->getSizes())) > 0) {
    //    		$link_element .= " sizes=\"" . $this->getSizes() . "\"";
    //     } else {
    //     	if(strlen(trim($this->getSizes())) > 0) {
    //     		Log::w("The \<link\> attribute 'sizes' is not needed when rel=\"" . $this->getRel() . "\"", $me);
    //     		$link_element .= " sizes=\"" . $this->getSizes() . "\"";
    //     	}
    //     }

    // 	if(strpos($this->getRel(), 'icon') === false && strlen(trim($this->getType())) > 0) {
    //    		$link_element .= " type=\"" . $this->getType() . "\"";
    //     } else {
    //     	if(strlen(trim($this->getType())) > 0) {
    //     		Log::w("The \<link\> attribute 'type' is not needed when rel=\"" . $this->getRel() . "\"", $me);
    //     		$link_element .= " type=\"" . $this->getType() . "\"";
    //     	}
    //     }

    //     if(strlen(trim($this->getHref())) > 0) {
    //     	$link_element .= " href=\"" . $this->getHref() . "\"";
    //     }

    //     $link_element .= " />";

    //     return $link_element;
    // }
    
} // end of class HeadLink
