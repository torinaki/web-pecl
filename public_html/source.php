<?php
// $Id$
$SIDEBAR_DATA='
<P>
The syntax highlighted source is automatically generated by PHP from
the plaintext script.
</P>
<P>
If you want to see the source of this page, have a look
<A href="/source.php?url=/source.php">here</A>.
</P>
';

response_header('Show Source');


echo "<H2>Show Source</H2>\n";

if (!isset($url)) {
    echo "No page URL specified.";
    commonFooter();
    exit;
}
?>
Source of: <?php echo $url; ?><BR>

<?php

echo hdelim(); 

$legal_dirs = array(
    "/manual" => 1,
    "/include" => 1,
	"/stats" => 1);

$dir = dirname($url);
if (isset($dir) && isset($legal_dirs[$dir])) {
    $page_name = $DOCUMENT_ROOT . $url;
} else {
    $page_name = basename($url);
}

echo("<!-- $page_name -->\n");

if (file_exists($page_name) && !is_dir($page_name)) {
    show_source($page_name);
} else if (is_dir($page_name)) {
    echo "<P>No file specified.  Can't show source for a directory.</P>\n";
}

response_footer();
?>
