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

foreach ($itemsLtd as $item) {
    $url = (isset($item['url'])) ? $item['url'] : '#';
    $separator = ($i < $countItems) ? ',' : '';

    $jsonLtdItem .=
        '{
        "@type": "ListItem",
                "position": ' . $i . ',
                "item":
                {
                    "@id": "' . $url . '",
                    "name": "' . $item['label'] . '"
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
?>


<script type="application/ld+json"><?= $jsonLtd ?></script>