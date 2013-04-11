<?php
/**
 * View class file
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * View class. Used to handle view templates for all models.
 * */
class View extends Chain {
	/**
	 * $_model_template contains path to template file
	 * */
	protected $_model_template = "";
	/**
	 * $_direct_output set to false to capture output buffer
	 * */
	protected $_direct_output = true;

	/**
	 * Constructor
	 * @param optional string $modelName Name of renderable class
	 * */
	public function __construct($modelName = "") {
		if (!(trim($modelName) == false)) {
			setTemplate($modelName);
		}
	}

	/**
	 * setTemplate sets the template file to use for the renderable
	 * 
	 * @param string $modelName Name of renderable class
	 * @return string $this->_model_template the template file to be used.
	 * */
	public function setTemplate($modelName) {
		$me = __FILE__ . '?' . __METHOD__;

        $parts = explode('\\', $modelName);
        $modelname = strtolower(end($parts));

		$loadFile = MJQM_DIR . "/views/{$modelname}.view.php";

		Log::d("Setting template to '" . $loadFile . "'", $me);
		if(!(trim($modelName) == false) && file_exists($loadFile)) {
			// we have a template file
			Log::d("Loading template '" . $loadFile . "'", $me);
			$this->_model_template = $loadFile;
			return $this->_model_template;
		} else {
			return false;
		}
	}
	/**
	 * sets the template file to use for the renderable
	 * 
	 * @param boolean $direct_output = true If we use direct output or not.
	 * */
	public function setDirectOutput($direct_output = true) {
		$this->_direct_output = $direct_output;
	}

	/**
	 * rendering the current Model with the given View Template
	 * 
	 * @param object $data This is an reference to the calling model class.
	 * @return string $output_buffer = "" Returns output_buffer if $direct_output is set to false. Else empty
	 * 
	 * */
	public function render($data) {
		$me = __FILE__ . "?" . __METHOD__;
		$output_buffer = "";

		if(!(trim($this->_model_template)==false) && file_exists($this->_model_template)) {
			if ($this->_direct_output !== true) {
				// Buffer output
				ob_start();
			}

			//runt the view template
			include($this->_model_template);

			if ($this->_direct_output !== true) {
				// Buffer output
				$output_buffer = ob_get_clean();
			}
		} else {
			Log::w("Unable to load template '" . $this->_model_template . "'", $me);
			//die("Unable to load template '" . $this->_model_template . "' " . $me);
		}
		return $output_buffer;
	}


	/**
	 * template is a chainable version of setTemplate
	 * 
	 * @param string $modelName Name of renderable class
	 * @return chainable reference to $this
	 * */
	public function chain_template($modelName) {
		$this->setTemplate($modelName);
	}
	/**
	 * directOutput is a chainable version of setDirectOutput
	 * 
	 * @param boolean $direct_output = true If we use direct output or not.
	 * @return chainable reference to $this 
	 * */
	public function chain_directOutput($direct_output = true) {
		$this->setDirectOutput($direct_output);
	}


}