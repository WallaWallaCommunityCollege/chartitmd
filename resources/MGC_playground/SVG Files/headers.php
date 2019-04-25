<?php
declare(strict_types=1);
$status = 0;
$sizes = array_reverse([600, 800, 960, 1200, 1600]);
foreach ($sizes as $size) {
    $file = "chart_it_md_header_${size}.png";
    $inkscape = "inkscape chart_it_md_header.svg -y 0 --export-png=\"${file}\" -w${size} --without-gui";
    passthru($inkscape, $status);
}
