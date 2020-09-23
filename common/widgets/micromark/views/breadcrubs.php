<?php
$mainBread = [
    [
        'label' => 'Главная',
        'url' => '/',
    ]
];


$itemsLtd = array_merge($mainBread, $items);

$countItems = count($items) + 1;
$i = 1;
$jsonLtdItem = '';

if (isset($itemsLtd) && is_array($itemsLtd)) {
    foreach ($itemsLtd as $item) {

        $url = (isset($item['url'])) ? $item['url'] : '#';
        $separator = ($i < $countItems) ? ',' : '';
        $itemLab = isset($item['label']) ? $item['label'] : '';

        $jsonLtdItem .=
            '{
        "@type": "ListItem",
                "position": ' . $i . ',
                "item":
                {
                    "@id": "' . $url . '",
                    "name": "' . $itemLab . '"
                }
            }' . $separator;

        $i++;
    }

    $jsonLtd = '{
        "@context": "http://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement":
        [
            ' . $jsonLtdItem . '
        ]
    }';
}


?>


<script type="application/ld+json"><?= $jsonLtd ?></script>