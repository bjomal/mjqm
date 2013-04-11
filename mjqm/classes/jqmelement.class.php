<?php
/**
 * File for the Element class
 * 
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * JqmElement class handles support for html Jquery Mobile elements.
 * 
 * */
class JqmElement extends Element {
	/**
	 * constants for data-role
	 * */
	const DR_PAGE = 'page';
	const DR_CONTENT = 'content';
	const DR_HEADER = 'header';
	const DR_COLLAPSIBLE = 'collapsible';
	const DR_LISTVIEW = 'listview';
	const DR_LIST_DIVIDER = 'list-divider';
	const DR_FOOTER = 'footer';
	const DR_CONTROLGROUP = 'controlgroup';
	const DR_FIELDCONTAIN = 'fieldcontain';
	const DR_SLIDER = 'slider';
	const DR_BUTTON = 'button';
	const DR_NAVBAR = 'navbar';
	const DR_NONE = 'none';
	const DR_COLLAPSIBLE_SET = 'collapsible-set';

	/**
	 * constants for data-inset true or false
	 * */
	const DI_TRUE = 'true';
	const DI_FALSE = 'false';

	/**
	 * Constants for data-theme a..d
	 * */
	const DT_A = 'a';
	const DT_B = 'b';
	const DT_C = 'c';
	const DT_D = 'd';

	/**
	 * Defaults
	 * */
	const DEFAULT_ROLE = self::DR_CONTENT;
	const DEFAULT_THEME = self::DT_A;
	const DEFAULT_ICON = '';
	const DEFAULT_DIRECTION = '';
	const DEFAULT_TRANSITION = '';
	const DEFAULT_INSET = '';

	protected $_data_role = self::DEFAULT_ROLE;
	protected $_data_theme = self::DEFAULT_THEME;
	protected $_data_icon = '';
	protected $_data_direction = '';
	protected $_data_transition = '';
	protected $_data_inset = '';

	/**
	 * Default constructor for new elements
	 * @param string $element_name Name of new element i.e. 'link' or 'div'
	 * */
	public function __construct( $data_role, $element_name = 'div' ) {
		$this->_data_role = $data_role;

		parent::__construct($element_name);
	}

    /**
     * Set the jqm data-role
     * 
     * @param string $dataRole The datarole of the jqm element
     * */
    public function setDataRole($data_role = self::DEFAULT_ROLE) {
        if(strlen(trim($data_role)) > 0) {
            $this->_data_role = $data_role;
        } else {
            $this->_data_role = "";
        }
    }
    /**
     * Get the data-role of the jqm element 
     * 
     * @return string $data_role Returns the jqm datarole.
     * */
    public function getDataRole() {
        return $this->_data_role;
    }

    /**
     * Set the jqm data-theme
     * 
     * @param string $data_theme The datarole of the jqm element
     * */
    public function setDataTheme($data_theme = self::DEFAULT_THEME) {
    	$me = __FILE__ . '?' . __METHOD__;
		Log::d("Setting theme to '" . $data_theme . "'", $me );	

        if(strlen(trim($data_theme)) > 0) {
            $this->_data_theme = $data_theme;
        } else {
            $this->_data_theme = "";
        }
    }
    /**
     * Get the data-theme of the jqm element 
     * 
     * @return string $data_theme Returns the jqm datarole.
     * */
    public function getDataTheme() {
        return $this->_data_theme;
    }

    /**
     * Set the jqm data-icon
     * 
     * @param string $data_icon The dataicon of the jqm element
     * */
    public function setDataIcon($data_icon = self::DEFAULT_ICON) {
        if(strlen(trim($data_icon)) > 0) {
            $this->_data_icon = $data_icon;
        } else {
            $this->_data_icon = "";
        }
    }
    /**
     * Get the data-icon of the jqm element 
     * 
     * @return string $data_icon Returns the jqm dataicon.
     * */
    public function getDataIcon() {
        return $this->_data_icon;
    }

    /** direction
     * Set the jqm data-direction
     * 
     * @param string $data_direction The datadirection of the jqm element
     * */
    public function setDataDirection($data_direction = self::DEFAULT_DIRECTION) {
        if(strlen(trim($data_direction)) > 0) {
            $this->_data_direction = $data_direction;
        } else {
            $this->_data_direction = "";
        }
    }
    /**
     * Get the data-direction of the jqm element 
     * 
     * @return string $data_direction Returns the jqm datadirection.
     * */
    public function getDataDirection() {
        return $this->_data_direction;
    }

    /** transition
     * Set the jqm data-transition
     * 
     * @param string $data_transition The datatransition of the jqm element
     * */
    public function setDataTransition($data_transition = self::DEFAULT_TRANSITION) {
        if(strlen(trim($data_transition)) > 0) {
            $this->_data_transition = $data_transition;
        } else {
            $this->_data_transition = "";
        }
    }
    /**
     * Get the data-transition of the jqm element 
     * 
     * @return string $data_transition Returns the jqm datatransition.
     * */
    public function getDataTransition() {
        return $this->_data_transition;
    }

    /** inset
     * Set the jqm data-inset
     * 
     * @param string $dataInset The datainset of the jqm element
     * */
    public function setDataInset($data_inset = self::DEFAULT_INSET) {
        if(strlen(trim($dataInset)) > 0) {
            $this->_data_inset = $data_inset;
        } else {
            $this->_data_inset = "";
        }
    }
    /**
     * Get the data-inset of the jqm element 
     * 
     * @return string $data_inset Returns the jqm datainset.
     * */
    public function getDataInset() {
        return $this->_data_inset;
    }






    /**
     * Get a string of attribute=value pairs
     * @return string $attributes String containing the attributes.
     * */
    public function attributes() {
        $attributes = "";
        if(strlen(trim($this->getDataRole()))>0) {
            $attributes .= " data-role=\"" . $this->getDataRole() . "\"";
        }
        if(strlen(trim($this->getDataTheme()))>0) {
            $attributes .= " data-theme=\"" . $this->getDataTheme() . "\"";
        }
        if(strlen(trim($this->getDataIcon()))>0) {
            $attributes .= " data-icon=\"" . $this->getDataIcon() . "\"";
        }
        if(strlen(trim($this->getDataDirection()))>0) {
            $attributes .= " data-direction=\"" . $this->getDataDirection() . "\"";
        }
        if(strlen(trim($this->getDataTransition()))>0) {
            $attributes .= " data-transition=\"" . $this->getDataTransition() . "\"";
        }
        if(strlen(trim($this->getDataInset()))>0) {
            $attributes .= " data-inset=\"" . $this->getDataInset() . "\"";
        }

        $attributes .= parent::attributes();

        return $attributes;

    }





    /** 
     * chainable version of setDataRole()
     * @param string $data_role = DEFAULT_ROLE
     * */
    public function chain_data_role($data_role = DEFAULT_ROLE) {
    	$this->setDataRole($data_role);
    }
    /** 
     * chainable version of setDataTheme()
     * @param string $data_role = DEFAULT_THEME
     * */
    public function chain_data_theme($data_theme = DEFAULT_THEME) {
    	$this->setDataTheme($data_theme);
    }

}
