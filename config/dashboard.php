<?php

return [
    /*
     * The dashboard supports these themes:
     *
     * - light: always use light mode
     * - dark: always use dark mode
     * - device: follow the OS preference for determining light or dark mode
     * - auto: use light mode when the sun is up, dark mode when the sun is down
     */
    'theme' => 'light',

    /*
     * When the dashboard uses the `auto` theme, these coordinates will be used
     * to determine whether the sun is up or down.
     */
    'auto_theme_location' => [
        'lat' => env('DASHBOARD_AUTO_THEME_LAT'),
        'lng' => env('DASHBOARD_AUTO_THEME_LONG'),
    ],

    /*
     * These scripts will be loaded when the dashboard is displayed.
     */
    'scripts' => [
        'alpinejs' => 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js',
    ],

    /*
     * These stylesheets will be loaded when the dashboard is displayed.
     */
    'stylesheets' => [
        'inter' => 'https://rsms.me/inter/inter.css'
    ],

    'tiles' => [
        'time_weather' => [
            'open_weather_map_key'  => env('OPEN_WEATHER_MAP_KEY'),
            'open_weather_map_city' => env('OPEN_WEATHER_CITY'),
            'units'                 => env('OPEN_WEATHER_UNITS', 'metric'), // 'metric' or 'imperial' (metric is default)
            'buienradar_latitude'   => env('BUIENRADAR_LATITUDE'),
            'buienradar_longitude'  => env('BUIENRADAR_LONGITUDE'),
        ],
        'calendar' => [
            'ids' => [
                env('GOOGLE_CALENDAR_ID'),
            ],
            'refresh_interval_in_seconds' => 60,
        ],
        'twitter' => [
            'configurations' => [
                'default' => [
                    'consumer_key'      => env('TWITTER_CONSUMER_KEY'),
                    'consumer_secret'   => env('TWITTER_CONSUMER_SECRET'),
                    'listen_for' => [
                        //
                    ],
                ],
            ],
            'refresh_interval_in_seconds' => 5,
        ],
        'spotify' => [
            'client_id'                     => env('SPOTIFY_CLIENT_ID'),
            'secret'                        => env('SPOTIFY_SECRET'),
            'refresh_interval_in_seconds'   => 60,
        ],

        'uptimerobot' => [
            'key'       => env('UPTIMEROBOT_KEY'),
            'monitors'  => explode (",",env('UPTIMEROBOT_MONITOR_IDS')),
        ],
        'packagist' => [
            'refresh_interval_in_seconds'   => 300,
            'sort'                          => 'total', // options: name, daily, monthly, total, empty means no sorting.
            'reverse'                       => true, // reverse the order
            'with_abandoned'                => true, // set to false to ignore them
            'display'                       => [
                'totals'        => true,
                'faves'         => true, // packagist faces
                'github_stars'  => true, // github stars
            ],
            'vendors' => explode (",",env('PACKAGIST_GITHUB_VENDORS')),
            'packages' => explode (",",env('PACKAGIST_GITHUB_PACKAGES')),
        ],
        'health_check' => [
            'sites' => [
                env('HEALTH_CHECK_1_NAME') => [
                    "url" => env('HEALTH_CHECK_1_URL'),
                    "headers" => [], // optional
                    "options" => [] // optional
                ]
            ],
            'timeout' => 3,
            'show_failures' => true,
            'refresh_interval' => 60
        ],
        'reddit' => [
            'general' => [
                'useragent' => 'web:laravel-dashboard-reddit-tile:0.1',
                'timezone' => env('REDDIT_TIMEZONE'), //Important to get the posted at
            ],
            'configurations' => [
                'default' => [
                    'subreddit'                     => 'laravel',
                    'sort_by'                       => 'new', // valid values are hot, new, rising, controversial, top
                    'refresh_interval_in_seconds'   => 120,
                ],
                // 'covid' => [
                //     'subreddit'                     => 'coronavirus',
                //     'sort_by'                       => 'new',
                //     'refresh_interval_in_seconds'   => 60,
                // ],
            ]
        ],
    ],
];

