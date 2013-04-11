<?php
/**
 * Viewer template for head model
 * 
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * */
namespace no\malmanger\mjqm;

/**
 * @ignore
 * */

// TODO: Handle HTTP header information here

?>
<!DOCTYPE <?php echo $data->getDocType(); ?> >
<html<?php $v_manifest = $data->getManifest(); if(strlen(trim($v_manifest))>0) { echo " manifest=\"" . $v_manifest . "\""; }?>>
<head>
	<meta charset="<?php echo $data->getCharset(); ?>">
<?php
	//meta tags
	foreach ($data->getMetaArray() as $key => $value) {
		//TODO: Print meta tags
		echo "\t" . $value->element(ScriptElement::ELEMENT_CLOSED) . "\n"; //"\t<meta name=\"" . $value->getName() . "\" content=\"" . $value->getContent() . "\" />\n";
	}

	//link tags
	foreach ($data->getLinkArray() as $key => $value) {
		//TODO: Print link tags
		echo "\t" . $value->element(ScriptElement::ELEMENT_CLOSED) . "\n"; //"\t<link name=\"" . $value->getName() . "\" content=\"" . $value->getContent() . "\" />\n";
	}
	foreach ($data->getStylesheetArray() as $key => $value) {
		//TODO: Print link tags
		echo "\t" . $value->element(ScriptElement::ELEMENT_CLOSED) . "\n"; //"\t<link name=\"" . $value->getName() . "\" content=\"" . $value->getContent() . "\" />\n";
	}

?>
	<title><?php echo $data->getTitle(); ?></title>
<?php
	//script tags
	foreach ($data->getScriptArray() as $key => $value) {
		//TODO: Print link tags
		echo "\t" . $value->element(ScriptElement::ELEMENT_EMPTY) . "\n"; //"\t<link name=\"" . $value->getName() . "\" content=\"" . $value->getContent() . "\" />\n";
	}

?>

</head>
<?php
