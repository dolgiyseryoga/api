<?php

function getProducts()
{
    $ch = curl_init();
    $options = [
        CURLOPT_URL => "https://belarusbank.by/api/news_info",
        CURLOPT_RETURNTRANSFER => true
    ];
    curl_setopt_array($ch, $options);

    $result = curl_exec($ch);

    $errors = curl_error($ch);
    if ($errors) {
        echo 'Error: (' . $errors . '):' . curl_error($ch);
    } else {
        return json_decode($result, true);
    }
}

function showProducts()
{
    $data = getProducts();
    // print_r($data);
    $html = '';
    $i = 0;
    foreach ($data as $name) {
        if ($i == 1) {
            break;
        }
        $i++;
        $html .= '
            <div class="name">
                <h4>' . $name['link'] . '</h4>
                <h4>' . $name['name_ru'] . '</h4>
                <h4>' . $name['start_date'] . '</h4>
                <h4>' . $name['html_ru'] . '</h4>
            </div>';
    }
    echo ' <div class="name_list">' . $html . '</div>';
}
