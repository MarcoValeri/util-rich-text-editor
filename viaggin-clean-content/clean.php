<?php

$inputFile = fopen("input.html", "r") or die("Unable to open this file");
$outputFile = fopen("output.html", "w") or die("Unable to open this file");

$remove = ' class="wp-block-heading"';

while (!feof($inputFile)) {
    $output = trim(fgets($inputFile));
    if (
        $output !== '<!-- wp:html -->' &&
        $output !== '<!-- /wp:html -->' &&
        $output !== '<!-- wp:paragraph -->' &&
        $output !== '<!-- /wp:paragraph -->' &&
        $output !== '<amp-ad width="100vw" height="320"' &&
        $output !== 'type="adsense"' &&
        $output !== 'data-ad-client="ca-pub-9306947071363993"' &&
        $output !== 'data-ad-slot="9939493911"' &&
        $output !== 'data-auto-format="rspv"' &&
        $output !== 'data-full-width="">' &&
        $output !== '<div overflow=""></div>' &&
        $output !== '</amp-ad>' &&
        $output !== '<!-- wp:heading -->' &&
        $output !== '<!-- /wp:heading -->' &&
        $output !== '<!-- /wp:heading -->' &&
        $output !== '<!-- /wp:heading -->' &&
        $output !== '<!-- /wp:image -->' &&
        $output !== '<!-- wp:list -->' &&
        $output !== '<!-- /wp:list-item -->' &&
        $output !== '<!-- wp:list-item -->' &&
        $output !== '<!-- /wp:list -->' &&
        strlen($output) > 0
        ) {
        $check = strpos($output, $remove);
        if ($check !== false) {
            $output = str_replace($remove, "", $output);
        }
        fwrite($outputFile, $output . "\n");
    }
}

fclose($inputFile);
fclose($outputFile);