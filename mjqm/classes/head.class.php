<?php
/**
 * File for Head class
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * Head class is the model representation for the Document head section
 * 
 * */
class Head extends BaseModel {
	/**
	 * $_doctype HTML document type, default = html
	 * */
	protected $_doctype = "html";
	/**
	 * $_manifest = "" manifest for html content, default = ""
	 * */
	protected $_manifest = "";
	/**
	 * $_headerAttr Attributes for document
	 * */
	protected $_headerAttr = "";
	/**
	 * $_charset for document
	 * */
	protected $_charset = CHARSET;
	/**
	 * $_title Document title
	 * */
	protected $_title = "";
	/**
	 * $_meta contain meta tags for the document
	 * */
	protected $_meta = array();
	/**
	 * $_link contain link tags for the document
	 * */
	protected $_link = array();
	/**
	 * $_stylesheet contain link tags of type=stylesheet for the document
	 * */
	protected $_stylesheet = array();
	/**
	 * $_script contain script tags for the document
	 * */
	protected $_script = array();

//	function __construct() {
//		// ensure config is run
//		
//		// $this->_page = $page;
//
//	}


	
	/**
	 * set which <!DOCTYPE to use
	 * @param string $doctype set to false to capture output buffer to string instead. Default = true 
	 * */
	public function setDocType($doctype) {
		$this->_doctype = $doctype;
	}
	/**
	 * get the current <!DOCTYPE 
	 * @return string the doctype
	 * */
	public function getDocType() {
		return $this->_doctype;
	}
	/**
	 * set wether or not to use a manifest file
	 * @param string $manifest set to false to capture output buffer to string instead. Default = true 
	 * */
	public function setManifest($manifest) {
		Log::d("setManifest(" . $manifest . ")");		
		$this->_manifest = $manifest;
	}
	/**
	 * get the current manifest 
	 * @return string the manifest file
	 * */
	public function getManifest() {

		Log::d("getManifest = " . $this->_manifest);
		return $this->_manifest;
	}
	/**
	 * set header attributes to use
	 * @param string $attr 
	 * */
	public function setHeaderAttr($attr) {
		$this->_headerAttr = $attr;
	}
	/**
	 * get the set Header Attributes
	 * @return string attributes
	 * */
	public function getHeaderAttr() {
		return $this->_headerAttr;
	}
	/**
	 * set charset
	 * @param string $charset = CHARSET
	 * */
	public function setCharset($charset = CHARSET) {
		$this->_charset = $charset;
	}
	/**
	 * get charset
	 * @return string $charset 
	 * */
	public function getCharset() {
		return $this->_charset;
	}
	/**
	 * set document title
	 * @param string $title = ""
	 * */
	public function setTitle($title = "") {
		$this->_title = $title;

	}
	/**
	 * get the set document title
	 * @return string document title
	 * */
	public function getTitle() {
		return $this->_title;
	}
	/**
	 * add meta tag for header
	 * @param string $name The meta name to set
	 * @param string $content = "" the content string for meta
	 * */
	public function addMeta($name, $content="") {
		$this->_meta[$name] = new HeadMeta($name, $content); 
	}
	/**
	 * get the selected HeadMeta object
	 * @param string @name the meta tag name to get information for
	 * @return string document title
	 * */
	public function getMeta($name) {
		return $this->_meta[$name];
	}
	/**
	 * get array of HeadMeta objects
	 * @return array $meta List of meta tags
	 * */
	public function getMetaArray() {
		return $this->_meta;
	}

	/**
	 * add link tag for header
	 * @param string $rel The link relation to set
	 * @param string $href = "" the content string for link
	 * @param string $type = "" Mime type of linked dokument
	 * @param string $sizes = HeadLink::DEFAULT_SIZES The sizes of any rel type that contains *icon*
	 * */
	public function addLink($rel, $href="", $type="", $sizes=HeadLink::DEFAULT_SIZES) {
		$this->_link[$rel] = new HeadLink($rel, $href, $type, $sizes); 
	}
	/**
	 * get the selected HeadLink object
	 * @param string @name the link tag name to get information for
	 * @return string document title
	 * */
	public function getLink($rel) {
		return $this->_link[$rel];
	}
	/**
	 * get array of HeadLink objects
	 * @return array $link List of link tags
	 * */
	public function getLinkArray() {
		return $this->_link;
	}

	/**
	 * add stylesheet tag for header
	 * @param string $href = "" the content string for stylesheet
	 * @param string $type = "" Mime type of stylesheeted dokument
	 * @param string $sizes = HeadLink::DEFAULT_SIZES The sizes of any rel type that contains *icon*
	 * */
	public function addStylesheet($href="", $type="", $sizes=HeadLink::DEFAULT_SIZES) {
		$this->_stylesheet[$href] = new HeadLink('stylesheet', $href, $type, $sizes); 
	}
	/**
	 * get the selected HeadLink object
	 * @param string @name the stylesheet tag name to get information for
	 * @return string document title
	 * */
	public function getStylesheet($href) {
		return $this->_stylesheet[$href];
	}
	/**
	 * get array of HeadLink objects
	 * @return array $stylesheet List of stylesheet tags
	 * */
	public function getStylesheetArray() {
		return $this->_stylesheet;
	}

	/**
	 * add script tag for header
	 * @param string $src = "" the content string for script
	 * @param string $type = ScriptElement::DEFAULT_TYPE The sizes of any rel type that contains *icon*
	 * */
	public function addScript($src = "", $type=ScriptElement::DEFAULT_TYPE) {
		$this->_script[] = new ScriptElement($src, $type); 
	}
	/**
	 * get the selected HeadScript object
	 * @param string @name the script tag name to get information for
	 * @return string document title
	 * */
	public function getScript($rel) {
		return $this->_script[$rel];
	}
	/**
	 * get array of HeadScript objects
	 * @return array $script List of script tags
	 * */
	public function getScriptArray() {
		return $this->_script;
	}




	/**
	 * chainable version of setting manifest file
	 * @param string $manifest 
	 * */
	public function chain_manifest($manifest = "") {
		$this->setManifest($manifest);
		return $manifest;
	}
	/**
	 * chainable version of setting title
	 * @param string $title 
	 * */
	public function chain_title($title = "") {
		$this->setTitle($title);
		return $title;
	}
	/**
	 * chainable version of setting document type
	 * @param string $doctype
	 * */
	public function chain_docType($doctype) {
		$this->setDocType($doctype);
		return $doctype;
	}
	/**
	 * chainable version of setting viewport
	 * @param optional string $content Set the content string for the meta tag
	 * */
	public function chain_viewport($content = "user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0") {
		$this->addMeta("viewport", $content);
	}
	/**
	 * chainable version of addMeta
	 * @param $name The name attribute of the meta tag
	 * @param optional string $content = "" Set the content string for the viewport
	 * */
	public function chain_meta($name, $content = "") {
		$this->addMeta($name, $content);
	}
	/**
	 * chainable version of addLink
	 * @param string $rel The link relation to set
	 * @param string $href = "" the content string for link
	 * @param string $type = "" Mime type of linked dokument
	 * @param string $sizes = HeadLink::DEFAULT_SIZES The sizes of any rel type that contains *icon*
	 * */
	public function chain_link($rel, $href="", $type="", $sizes=HeadLink::DEFAULT_SIZES) {
		$this->addLink($rel, $href, $type, $sizes);
	}
	/**
	 * chainable version of addStylesheet
	 * @param string $href = "" the content string for stylesheet
	 * @param string $type = "" Mime type of stylesheeted dokument
	 * @param string $sizes = HeadLink::DEFAULT_SIZES The sizes of any rel type that contains *icon*
	 * */
	public function chain_stylesheet($href="", $type="", $sizes=HeadLink::DEFAULT_SIZES) {
		$this->addStylesheet($href, $type, $sizes);
	}
	/**
	 * chainable version of addScript
	 * @param string $src = "" the content string for script
	 * @param string $type = ScriptElement::DEFAULT_TYPE The sizes of any rel type that contains *icon*
	 * */
	public function chain_script($src = "", $type=ScriptElement::DEFAULT_TYPE) {
		$this->addScript($src, $type);
	}
}
