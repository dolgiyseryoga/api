<?php



function getProducts() {

$ch = curl_init();


$options = [
    CURLOPT_URL =>"https://belarusbank.by/api/news_info",
    CURLOPT_RETURNTRANSFER => true
];

curl_setopt_array($ch, $options);

$result = curl_exec($ch);

curl_close($ch);

$data = json_decode($result, true);


print_r($data);
}

function showProducts(){
    $data = getProducts();


        $html = '';
    foreach ($data as $Array) {
        $html .= '
        <div class="product">
            <h3>' . $Array['link'] . '</h3>

        </div>
        ';
        
    }
                if (!empty($html)) echo ' <div class="product_list">' . $html . '</div>';
}