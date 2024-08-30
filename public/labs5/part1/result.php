<?php
$items = [];
$text = '';
if($fr = fopen('accounts.txt', 'r')){
    while(!feof($fr)){
        $text .= fgets($fr).'\n';
        $data = explode(';', $text);
        $date = DateTimeImmutable::createFromFormat("d/m/Y", trim($data[0]));
        $name = trim($data[1]);
        $login = trim(explode(':', $data[2])[0]);
        $password = trim(explode(':', $data[2])[1]);
        $items[] = ['date' => $date, 'name' => $name, 'login' => $login, 'password' => $password];
    }
    fclose($fr);
}
if(file_exists('accounts.xml')){
    $xml = simplexml_load_file('accounts.xml');
    foreach ($xml->children() as $child) {
        $items[] = ['date' => DateTimeImmutable::createFromFormat("d/m/Y", (string)$child->date), 'name' => $child->name, 'login' => $child->login, 'password' => $child->password];
    }
}

function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

$sorted_arr = array_sort($items, 'date', SORT_ASC);


foreach ($sorted_arr as $item) {
    echo "{$item['date']->format('d/m/Y')}; {$item['name']}; {$item['login']}:{$item['password']};<br/>";
}