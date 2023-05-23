<?php
$code = file_get_contents("http://quotes.toscrape.com");
$code = str_replace(">", "<>", $code);

$splitCode = explode("<", $code);

// Find the first occurance of the opening tag of the quotes: 
$openingTag = array_search('span class="text" itemprop="text"', $splitCode, true);
echo $openingTag;

// Find the first occurance of the closing tag of the quotes 
$closingTag = array_search('/span', $splitCode, true);
echo $closingTag;

// Now, find the text in between the tags 
$i = $openingTag;
$total = "";
while ($i < $closingTag) {
	$total = $total . $splitCode[$i];
	$i = $i + 1;
}
$final = substr($total, 37);
echo $final;
?>