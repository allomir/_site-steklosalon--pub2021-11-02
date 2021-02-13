<?php

namespace ownsite\functions;

function saveDataToArrfile(string $arrfileName, array $array): bool
{
    $arrName = pathinfo($arrfileName, PATHINFO_FILENAME);

    $arrToString = "<?php" . PHP_EOL;
    $arrToString .= "$$arrName = [" . PHP_EOL;
    foreach ($array as $key => $row) {
        $arrToString .= "   $key => [";
        foreach ($row as $key => $value) {
            if (is_array($value)) {
                $value2 = implode(', ', $value);
                $arrToString .= "'$key' => [$value2], ";
            } elseif (is_int($value)) {
                $arrToString .= "'$key' => $value, ";
            } elseif ($value === null OR $value === '') {
                $arrToString .= "'$key' => null, ";
            } else {
                $arrToString .= "'$key' => '$value', ";
            }
        }
        $arrToString .= "]," . PHP_EOL;
    }
    $arrToString .= '];';

    return file_put_contents($arrfileName, $arrToString);
}

function latinTrans(string $string): string
{
    return str_replace(
        [
            ' ', 
            'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж',  'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц',  'ч',  'ш',  'щ',    'ы', 'ь', 'ъ',  'э', 'ю',  'я',
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж',  'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц',  'Ч',  'Ш',  'Щ',    'Ы', 'Ь', 'Ъ',  'Э', 'Ю',  'Я',
        ],
        [
            '-', 
            'a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'shch', 'y', '',  'ie', 'e', 'iu', 'ia',
            'A', 'B', 'V', 'G', 'D', 'E', 'E', 'Zh', 'Z', 'I', 'I', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'Ts', 'Ch', 'Sh', 'Shch', 'Y', '',  'Ie', 'E', 'Iu', 'Ia',
        ],
        $string
    );
}


