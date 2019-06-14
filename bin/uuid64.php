<?php
declare(strict_types=1);
try {
    $data = \random_bytes(16);
} catch (Exception $e) {
    print $e . PHP_EOL;
}
$data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
$data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
$base64 = toBase64($data);
print 'uuid64:' . PHP_EOL;
print $base64 . PHP_EOL;
/**
 * @param string $data
 *
 * @return string
 */
function toBinaryString(string $data) {
    $result = '';
    foreach (str_split($data) as $byte) {
        $result .= str_pad(decbin(ord($byte)), 8, '0', STR_PAD_LEFT);
    }
    return $result;
}
/**
 * @param string $data
 *
 * @return string
 */
function toBase64(string $data): string {
    $base64 = [
        '000000' => '0',
        '000001' => '1',
        '000010' => '2',
        '000011' => '3',
        '000100' => '4',
        '000101' => '5',
        '000110' => '6',
        '000111' => '7',
        '001000' => '8',
        '001001' => '9',
        '001010' => 'a',
        '001011' => 'b',
        '001100' => 'c',
        '001101' => 'd',
        '001110' => 'e',
        '001111' => 'f',
        '010000' => 'g',
        '010001' => 'h',
        '010010' => 'i',
        '010011' => 'j',
        '010100' => 'k',
        '010101' => 'l',
        '010110' => 'm',
        '010111' => 'n',
        '011000' => 'o',
        '011001' => 'p',
        '011010' => 'q',
        '011011' => 'r',
        '011100' => 's',
        '011101' => 't',
        '011110' => 'u',
        '011111' => 'v',
        '100000' => 'w',
        '100001' => 'x',
        '100010' => 'y',
        '100011' => 'z',
        '100100' => 'A',
        '100101' => 'B',
        '100110' => 'C',
        '100111' => 'D',
        '101000' => 'E',
        '101001' => 'F',
        '101010' => 'G',
        '101011' => 'H',
        '101100' => 'I',
        '101101' => 'J',
        '101110' => 'K',
        '101111' => 'L',
        '110000' => 'M',
        '110001' => 'N',
        '110010' => 'O',
        '110011' => 'P',
        '110100' => 'Q',
        '110101' => 'R',
        '110110' => 'S',
        '110111' => 'T',
        '111000' => 'U',
        '111001' => 'V',
        '111010' => 'W',
        '111011' => 'X',
        '111100' => 'Y',
        '111101' => 'Z',
        '111110' => '_',
        '111111' => '#',
    ];
    // Left pad to even number of 6 bits (134) for split.
    $binary = '0000' . toBinaryString($data);
    $result = '';
    $sixBits = str_split($binary, 6);
    foreach ($sixBits as $idx) {
        $result .= $base64[$idx];
    }
    return $result;
}
