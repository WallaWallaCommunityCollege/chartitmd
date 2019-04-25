<?php
declare(strict_types=1);
$files = [];
$status = 0;
$sizes = array_reverse([16, 32, 64, 96, 128, 256]);
foreach ($sizes as $size) {
    $file = "icon-${size}.png";
    $inkscape = "inkscape icon.svg -y 0 --export-png=\"${file}\" -w${size} -h${size} --without-gui";
    passthru($inkscape, $status);
    $files[] = $file;
}
$convert = 'convert ' . implode(' ', $files) . ' chart_it_md.ico';
passthru($convert, $status);
foreach ($files as $file) {
    unlink($file);
}
