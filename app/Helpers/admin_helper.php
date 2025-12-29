<?php

function admin_sidebar_items(): array
{
    $items = [
        [
            'label' => 'Dashboard',
            'icon'  => '🏠',
            'url'   => '/admin',
            'order' => 0,
        ],
        [
            'label' => 'Zwierzęta',
            'icon'  => '🐾',
            'url'   => '/admin/animals',
            'order' => 20,
        ],
    ];

    if ($logger = config('LoggerModule')) {
        $items = array_merge($items, $logger->menu);
    }

    usort($items, fn ($a, $b) => ($a['order'] ?? 0) <=> ($b['order'] ?? 0));

    return $items;
}
