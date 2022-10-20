<?php
function model($model) {
    $data['family'] = $model;

    if (mb_stripos($model, ',', 0) !== false) {
        $tmp = explode(',', $model);
        $data['family'] = trim(array_shift($tmp));
        $data['generation'] = trim(array_shift($tmp));
    }

    return $data;
}
function modification($modification) {
    $data = $check = $match = [];
    preg_match_all('#(\d\.\d)?(?:(d|hyb)|(Electro))? ([DAMCV]{1,2}+T).*?\((\d+) л.с.\)#siu', $modification, $match);
    array_shift($match);

    $prop = ['volume', 'motor', 'electro', 'trans', 'hp'];

    foreach ($prop as $v) {
        $tmp = array_shift($match);
        $check[$v] = array_shift($tmp);
    }

    $data['volume'] = $check['volume'];
    $data['motor'] = 'Бензин';


    if ($check['motor'] === 'd') {
        $data['motor'] = 'Дизель';
    } else if ($check['motor'] === 'hyb') {
        $data['motor'] = 'Гибрид';
    } else if ($check['electro'] === 'Electro') {
        $data['motor'] = 'Электро';
    }
    $data['modification'] = "${data['motor']} ${data['volume']}";

    $data['transmission'] = 'АТ';

    if (in_array(mb_strtolower($check['trans']), ['мт', 'mt'])) {
        $data['transmission'] = 'МТ';
    } elseif (in_array(mb_strtolower($check['trans']), ['dct'])) {
        $data['transmission'] = 'робот';
    }

    $data['horse_power'] = $check['hp'];
    $data['drive'] = 'Передний';

    if (mb_stripos($modification, '4WD', 0) !== false) {
        $data['drive'] = 'Полный';
    }

    return $data;
}


$text = file_get_contents('https://avtoruss.ru/landing/feed/kia_but_new_landing.xml');
$xml = new SimpleXMLElement($text);
$data = [];

foreach ($xml->cars->car as $k => $v) {
    $temp = (array) $v;

    preg_match('/кредит от(.*?)руб/iu', $temp['bonus'], $matches);
    $credit = $matches[1];

    $month_offer = $temp['month_offer'] ?: 'none';

    $item = [
        'outer_color' => $temp['color'],
        'color' => $temp['color'],
        'model' => $temp['folder_id'],
        'complectation' => $temp['comlectation'],
        'price' => $temp['price'],
        'discount_price' => $temp['discount_price'],
        'mark' => $temp['mark_id'],
        'id' => $temp['unique_id'],
        'vin' => $temp['vin'] ?: $temp['unique_id'],
        'year' => $temp['year'],
        'engine' => $temp['modification_id'],
        'body_type' => $temp['body_type'],
        'comment' => explode(';', $temp['description']),
        'credit' => trim($credit),
        'month_offer' => $month_offer,
        'max_discount2' => $temp['max_discount'],
    ];

    if ($item['model'] == 'RIO X') {
        $item['model'] = 'Rio X';
    }

    if ($temp['bonus']) {
        $bonus = preg_split('/\.?[!|.]\s/', $temp['bonus']);
        foreach ($bonus as $bonus_item) {
            if (!is_bool(mb_strripos($bonus_item, 'выгода'))) {
                $item['bonus']['benefit'] = $bonus_item . '.!';
            } else if (!is_bool(mb_strripos($bonus_item, 'кредит'))) {
                $item['bonus']['credit'] = $bonus_item;
            } else if (!is_bool(mb_strripos($bonus_item, 'бонусы'))) {
                $item['bonus']['bonus'] = $bonus_item;
            } else if (!is_bool(mb_strripos($bonus_item, 'каско'))) {
                $item['bonus']['kasko'] = $bonus_item;
            }
        }

        if ($temp['gifts']) {
            $item['bonus']['gift'] = 'Путешествие в подарок!';
        }
    }

    $item = array_merge($item, model($item['model']));
    $item = array_merge($item, modification($temp['modification_id']));

    // Убираем одинаковые авто из выборки
    if (!empty($data)) {
        $isUnique = true;
        foreach ($data as $car) {
            if (
                $item['model'] == $car['model'] &&
                $item['color'] == $car['color'] &&
                $item['complectation'] == $car['complectation'] &&
                $item['modification'] == $car['modification'] &&
                $item['transmission'] == $car['transmission']
            ) {
                $isUnique = false;
            }
        }
        if ($isUnique) {
            $data[$temp['unique_id']] = $item;
        }
    } else {
        $data[$temp['unique_id']] = $item;
    }

}
file_put_contents('new.json', json_encode($data));
