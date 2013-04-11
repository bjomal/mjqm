<?php
/**
 * Viewer template for multipage model
 * 
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * @ignore
 * */

// now we have to render childrens... starting with head

//Log::d("Debug some context information. \n\$data: " . var_dump($this) . "", __FILE__);

$data->head()->render();

echo "<body>\n";
foreach ($data->pages() as $page) {
	$page->render();
}

echo "</body><html>";
