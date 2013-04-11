<?php 
/**
 * File for the Chain class
 * 
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * Chain class handles support for chainable methods in classes.
 * 
 * */
class Chain implements IChainable {
    /**
     * Descendants of this class must use `chain_` prefix for all
     * methods they wish to make chainable. The method can then be
     * called by its base name.
     * 
     * Return values from called methods are lost.
     * 
     * @param string $name name of the method called
     * @param array $arguments array of arguments supplied to method
     * @return PlainChain $this instance of this class
     */
    public function __call($name, array $arguments) {
        $me = __FILE__ . '?' . __METHOD__;
        $method = "chain_{$name}";

        if(method_exists($this, $method)) {
            $ret = call_user_func_array(array($this, $method), $arguments);
            Log::d("Call to function '$name':Returned " . print_r($ret, true) . "", $me);
        } else {
            // due to other possible __call implementations, this only gives an information message
            Log::w("Call to undefined method '" . $method . "'", $me);
        }
        
        return $this;
    }

}