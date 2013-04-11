<?php
/**
 * Viewer template for page model
 * 
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * @ignore
 * */


echo $data->page()->element(JqmElement::ELEMENT_START) . "\n";
if (!is_null($data->header())) {
	echo "\t" . $data->header()->element(JqmElement::ELEMENT_CONTENT) . "\n";
}
// Content rendering goes here
if (!is_null($data->content())) {
	echo "\t" . $data->content()->element(JqmElement::ELEMENT_CONTENT) . "\n";
}


if (!is_null($data->footer())) {
	echo "\t" . $data->footer()->element(JqmElement::ELEMENT_CONTENT) . "\n";
}

echo $data->page()->getCloseElement() . "\n";
