<?php
/**
 * File for Page class
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * Page class handles support for jquery-mobile pages.
 * 
 * */
class Page extends BaseModel {

	/**
	 * Page element tag
	 * */
	protected $_page = null;
	/**
	 * Page header element tag
	 * */
	protected $_header = null;
	/**
	 * Page footer element tag
	 * */
	protected $_footer = null;
	/**
	 * Page content element tag
	 * */
	protected $_content = null;

	/**
	 * $_id Page id
	 * */
	protected $_id = "";
	/**
	 * $_title Page title
	 * */
	protected $_title = "";


	/**
	 * Create the page object
	 * @param string $id = '' set the id attribute of the page element
	 * @param string $data_theme = 'a' sets which theme-roller theme to use
	 * */
	public function __construct($id = '', $data_theme = JqmElement::DEFAULT_THEME) {
		$this->_page = new JqmElement(JqmElement::DR_PAGE);

		$this->setId($id);
		$this->setPageTheme($data_theme);
	}

	/** 
	 * set Page id
	 * @param string $id = ''
	 *
	 * */
	public function setId($id = '') {
		$this->_page->setId($id);
	}

	/**
	 * set Page title
	 * @param string $title = '' set the title attribute of the page element
	 * @param string $data_theme = '' sets which theme-roller theme to use for header
	 * */
	public function setTitle($title = '' , $data_theme = '') {
		if (is_null($this->_header)) { $this->_header = new JqmElement(JqmElement::DR_HEADER); }

		$this->_title = $title;
		$this->_header->content("<h1>" . $this->_title . "</h1>");
		if (strlen($data_theme)>0) {
			$this->_header_theme = $data_theme;
		}
	}
	/**
	 * get Page title
	 * @return string $title get the title of the page
	 * */
	public function getTitle() {
		return $this->_title;
	}

   
	/**
	 * set Page content
	 * @param string $content = '' set the content of the page element
	 * @param string $data_theme = '' sets which theme-roller theme to use for content
	 * */
	public function setContent($content = '' , $data_theme = JqmElement::DEFAULT_THEME) {
		if (is_null($this->_content)) { $this->_content = new JqmElement(JqmElement::DR_CONTENT); }

		$this->_content->content($content);
//		$this->_content->content("<h1>" . $this->_content-> . "</h1>");
		if (strlen($data_theme)>0) {
			$this->_content_theme = $data_theme;
		}
	}
	/**
	 * get Page content
	 * @return string $content get the content of the page
	 * */
	public function getContent() {
		return $this->_content;
	}


	/**
	 * set Page footer
	 * @param string $footer = '' set the footer attribute of the page element
	 * @param string $data_theme = '' sets which theme-roller theme to use for footer
	 * */
	public function setFooter($footer = '' , $data_theme = JqmElement::DEFAULT_THEME) {
		if (is_null($this->_footer)) { $this->_footer = new JqmElement(JqmElement::DR_FOOTER); }

		$this->_footer->content($footer);
//		$this->_footer->content("<h1>" . $this->_footer-> . "</h1>");
		if (strlen($data_theme)>0) {
			$this->_footer_theme = $data_theme;
		}
	}
	/**
	 * get Page footer
	 * @return string $footer get the footer of the page
	 * */
	public function getFooter() {
		return $this->_footer;
	}

   
	/**
	 * set Page data_theme
	 * @param string $data_theme
	 * */
	public function setPageTheme($data_theme) {
		$this->page()->{'data-theme'} = $data_theme;
		return $this->_title;
	}
	/**
	 * get Page data_theme
	 * @return string $data_theme
	 * */
	public function getPageTheme() {
		return $this->_page_theme;
	}

	/**
	 * TODO: Fix this to use JqmElement
	 * set Header data_theme
	 * @param string $data_theme
	 * */
	public function setHeaderTheme($data_theme) {
		$this->header()->{'data-theme'} = $data_theme;
	}
	/**
	 * TODO: Fix this to use JqmElement
	 * get Header data_theme
	 * @return string $data_theme
	 * */
	public function getHeaderTheme() {
		return $this->header()->{'data-theme'};
	}


	/**
	 * TODO: Fix this
	 * set Footer data_theme
	 * @param string $data_theme
	 * */
	public function setFooterTheme($data_theme) {
		if (is_null($this->_footer)) { $this->_footer = new JqmElement(JqmElement::DR_FOOTER); }
		$this->footer()->{'data-theme'} = $data_theme;
	}
	/**
	 * TODO: Fix this
	 * get Footer data_theme
	 * @return string $data_theme
	 * */
	public function getFooterTheme() {
		if (is_null($this->_footer)) { $this->_footer = new JqmElement(JqmElement::DR_FOOTER); }
		return $this->footer()->{'data-theme'};
	}

	/**
	 * get Page element
	 * @return JqmElement $page
	 *
	 * */
	public function page() {
		return $this->_page;
	}
	/**
	 * get header element
	 * @return JqmElement $header
	 *
	 * */
	public function header() {
		return $this->_header;
	}
	/**
	 * get content element
	 * @param JqmElement $new_content
	 * @return Array(JqmElement) $content if content is omitted OR $this(chainable) if setting content
	 *
	 * */
	public function content($new_content = null) {
		if (is_null($this->_content)) { $this->_content = new JqmElement(JqmElement::DR_CONTENT); }
		if (is_null($new_content)) {
			return $this->_content;
		} else {
			// Set content and make chainable
			$this->_content->content($new_content);
			return $this;
		}
		
	}
	/**
	 * get footer element
	 * @return JqmElement $footer
	 *
	 * */
	public function footer() {
		return $this->_footer;
	}


	/**
	 * chainable version of setTitle
	 * @param string $title = '' set the title attribute of the page element
	 * @param string $data_theme = '' sets which theme-roller theme to use for header
	 * */
	public function chain_title($title = '' , $data_theme = JqmElement::DEFAULT_THEME) {
		$this->setTitle($title, $data_theme);
	}
	/**
	 * chainable version of setFooter
	 * @param string $footer = '' set the footer string of the page element
	 * @param string $data_theme = '' sets which theme-roller theme to use for header
	 * */
//	public function chain_footer($footer = '' , $data_theme = JqmElement::DEFAULT_THEME) {
//		$this->setFooter($footer, $data_theme);
//	}

}

