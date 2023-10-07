<?php 
// local files 
$html = file_get_contents('html_tags.html'); 
$matched = array();
$classes = array();
$links = array();
$tagname = "a" ;
$dom = new DOMDocument(); 
@$dom->loadHtml($html);
$length = $dom->getElementsByTagName($tagname)->length;
header('Content-Type: text/plain');
echo "$tagname : ".$length." founded " ;
for($i=0;$i<$length;$i++){
    $matched[] = $dom->getElementsByTagName($tagname)->item($i);
    $classes[] = $dom->getElementsByTagName($tagname)->item($i)->getAttribute('class');
    $links[] = $dom->getElementsByTagName($tagname)->item($i)->getAttribute('href');
// or   $matched[] = $dom->getElementsByTagName("div")->item($i)->nodeValue;
}
print_r($links) ;