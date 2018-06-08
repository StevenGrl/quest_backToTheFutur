<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    'Default' => [ // Controller
        ['index', '/', 'GET'], // action, url, method
        ['error', '/error/{error:\d+}', 'GET'], // action, url, method
    ],
    'TimeTravel' => [
        ['index', '/travel', 'POST'],
        ['findDate', '/travel/findDate', 'POST'],
    ]
];
