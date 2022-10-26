<?php
$dir = "./out/";
$scanned_directory = glob('./out/*.{svg}', GLOB_BRACE);

foreach ($scanned_directory as $value) {
    $outputf = str_replace("out", "img", $value);
    $outputf = str_replace(".svg", ".png", $outputf);
    $cmd = "rsvg-convert " . $value . " -o " . $outputf . " -w 30 -a";
    `$cmd`;
}
