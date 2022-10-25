<?php

function progressBar($done, $total)
{
    $perc = floor(($done / $total) * 100);
    $left = 100 - $perc;
    $write = sprintf("\033[0G\033[2K[%'={$perc}s>%-{$left}s] - $perc%% - $done/$total", "", "");
    fwrite(STDERR, $write);
}

$ds = array();
#$inpath = "./in-seg/";
$inpath = "./in-vec/";
for ($i = 1; $i < 10000; $i++) {
    $a = strval($i);
    while (strlen($a) < 4) {
        $a = "0" . $a;
    }
    array_push($ds, str_split($a));
}
echo "Generating SVG files" . PHP_EOL;
foreach ($ds as $key => $value) {
    $out = array();
    $outf = implode($value) . ".svg";
    # 1000s
    if ($value[0] > 0) {
        $f = $value[0] . "000.svg";
        array_push($out, trim(file_get_contents($inpath . $f)));
    }
    #100s
    if ($value[1] > 0) {
        $f = $value[1] . "00.svg";
        array_push($out, trim(file_get_contents($inpath . $f)));
    }
    #10s
    if ($value[2] > 0) {
        $f = $value[2] . "0.svg";
        array_push($out, trim(file_get_contents($inpath . $f)));
    }
    #1s
    if ($value[3] > 0) {
        $f = $value[3] . ".svg";
        array_push($out, trim(file_get_contents($inpath . $f)));
    }
    $txt = implode("\n", $out);
    $base = file_get_contents($inpath . "base.svg");
    $baseout = str_replace("@rep@", $txt, $base);
    file_put_contents("./out/" . $outf, $baseout);
    progressBar($key + 1, 9999);

}
