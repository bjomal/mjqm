<?php
/**
 * This file contains the base model for all viewable objects
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * This class contains the base model for all viewable objects
 * */
class BaseModel extends Chain implements IRenderable {

    /**
     * Default model rendering. Classes could override this, but it's not required.
     * 
     * @param boolean $direct_output if output should go directly to screen. Default is true.
     * @return string $output_buffer if $direct_output is set to false. Else nothing. 
     */
    public function render($direct_output = true) {
        $me = __FILE__ . '?' . __METHOD__;
        $modelName = get_called_class();

        $view = new View();
        $view->template($modelName)->directOutput($direct_output);

        $output_buffer = $view->render($this);

        if ($direct_output !== true) {
            if(!(trim($output_buffer) == false)) {
                Log::d("View->render() returned output_buffer for '" . $modelName . "':" . $output_buffer, $me );
            } else {
                //Warn if no data. This could in some cases be expected behaviour. i.e. empty lists
                Log::w("View->render() did not return any output_buffer for '" . $modelName . "'", $me);
            }
            return $output_buffer;
        }
    }
}
