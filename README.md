# Laravel Dashboard

#### This is an example of Spatie Laravel Dashboard using Livewire and package components. This example has all settings extended to the `dashboard.php` config file and the `.env` file. This example uses minimal styling and customization.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

#### Table of contents
- [Installation Instructions](#installation-instructions)
- [Routes](#routes)
- [Environment File](#environment-file)
- [Cron Command Example](#cron-command-example)
- [Artisan Commands](#artisan-commands)
- [Packages Used](#packages-used)
- [Helpful Links](#helpful-links)
- [File Tree](#file-tree)
- [Opening an Issue](#opening-an-issue)
- [License](#license)

### Installation Instructions
1. Run `git clone git@github.com:jeremykenedy/laravel-dashboard.git laravel-dashboard`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database dashboard;```
    * ```\q```
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file
5. Run `composer update` from the projects root folder
6. From the projects root folder run `php artisan key:generate`
7. From the projects root folder run `php artisan migrate`
8. From the projects root folder run `composer dump-autoload`
9. From the projects root folder run `php artisan db:seed`
10. Setup your [Cron](#cron-command-example) to run or run the manual [Artisan Commands](#artisan-commands) to see initial data.

### Routes

```bash
+--------+----------+----------------------------------+-----------------------+---------------------------------------------------------------------+---------------+
| Domain | Method   | URI                              | Name                  | Action                                                              | Middleware    |
+--------+----------+----------------------------------+-----------------------+---------------------------------------------------------------------+---------------+
|        | GET|HEAD | /                                |                       | Illuminate\Routing\ViewController                                   | web           |
|        | GET|HEAD | api/user                         |                       | Closure                                                             | api           |
|        |          |                                  |                       |                                                                     | auth:api      |
|        | GET|HEAD | livewire/livewire.js             |                       | Livewire\Controllers\LivewireJavaScriptAssets@source                |               |
|        | GET|HEAD | livewire/livewire.js.map         |                       | Livewire\Controllers\LivewireJavaScriptAssets@maps                  |               |
|        | POST     | livewire/message/{name}          |                       | Livewire\Controllers\HttpConnectionHandler                          | web           |
|        | GET|HEAD | livewire/preview-file/{filename} | livewire.preview-file | Livewire\Controllers\FilePreviewHandler@handle                      | web           |
|        | POST     | livewire/upload-file             | livewire.upload-file  | Livewire\Controllers\FileUploadHandler@handle                       | web           |
|        |          |                                  |                       |                                                                     | throttle:60,1 |
|        | GET|HEAD | spotify/authorize                | spotify.authorize     | Ashbakernz\SpotifyTile\SpotifyController@authorizeApplication       |               |
|        | GET|HEAD | spotify/callback                 | spotify.callback      | Ashbakernz\SpotifyTile\SpotifyController@storeTokens                |               |
|        | GET|HEAD | spotify/refresh                  | spotify.refresh       | Ashbakernz\SpotifyTile\SpotifyController@refreshTokens              |               |
|        | POST     | temperature                      |                       | Spatie\TimeWeatherTile\Http\Controllers\UpdateTemperatureController |               |
+--------+----------+----------------------------------+-----------------------+---------------------------------------------------------------------+---------------+
```

* Generate in CLI with 'php artisan route:list'

### Environment File
Example `.env` file:

```bash

APP_NAME=Dashboard
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://dashboard.local

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=dashboard.local
DB_PORT=3306
DB_DATABASE=dashboard
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

DASHBOARD_AUTO_THEME_LAT=
DASHBOARD_AUTO_THEME_LONG=

# https://home.openweathermap.org/api_keys
OPEN_WEATHER_MAP_KEY=
OPEN_WEATHER_CITY=Portland
OPEN_WEATHER_UNITS=imperial
BUIENRADAR_LATITUDE="${DASHBOARD_AUTO_THEME_LAT}"
BUIENRADAR_LONGITUDE="${DASHBOARD_AUTO_THEME_LONG}"

# https://github.com/spatie/laravel-google-calendar#how-to-obtain-the-credentials-to-communicate-with-google-calendar
GOOGLE_CALENDAR_ID=

# https://github.com/spatie/laravel-twitter-streaming-api#getting-credentials
TWITTER_CONSUMER_KEY=
TWITTER_CONSUMER_SECRET=

# https://developer.spotify.com/dashboard/
SPOTIFY_CLIENT_ID=
SPOTIFY_SECRET=

# https://uptimerobot.com/dashboard#mySettings
UPTIMEROBOT_KEY=
UPTIMEROBOT_MONITOR_IDS='ID_ONE_HERE, ID_TWO_HERE, ID_THREE_HERE' # Accepts a comma separated list of IDS.

PACKAGIST_GITHUB_VENDORS='jeremykenedy'
PACKAGIST_GITHUB_PACKAGES='spatie/laravel-dashboard, ukfast/laravel-health-check, ashbakernz/laravel-dashboard-spotify-tile, VineVax/laravel-dashboard-uptime-robot-tile' # Accepts a comma separated list of packages.

HEALTH_CHECK_1_NAME='Your APP Name'
HEALTH_CHECK_1_URL=https://your-app-url.com/health

REDDIT_TIMEZONE='America/Los_Angeles'


```

### Cron Command Example

```bash
crontab -e
* * * * * php /home/vagrant/sites/dashboard/artisan schedule:run
```

### Artisan Commands
```
php artisan dashboard:fetch-buienradar-forecasts
php artisan dashboard:fetch-open-weather-data
php artisan dashboard:fetch-calendar-events
php artisan dashboard:listen-twitter-mentions
php artisan dashboard:fetch-data-from-spotify-api
php artisan dashboard:refresh-access-token-spotify
php artisan dashboard:fetch-uptime-robot-data
php artisan dashboard:fetch-package-data-from-packagist
php artisan dashboard:fetch-vendor-packages-from-packagist
php artisan dashboard:listen-reddit-posts
php artisan dashboard:fetch-health-check-data
```

### Packages Used
- https://github.com/spatie/laravel-dashboard
- https://github.com/ashbakernz/laravel-dashboard-spotify-tile
- https://github.com/tylerwoonton/laravel-dashboard-health-check-tile
- https://github.com/ukfast/laravel-health-check
- https://github.com/ingoldsby/laravel-dashboard-google-analytics-realtime-tile
- https://github.com/spatie/laravel-dashboard-time-weather-tile
- https://github.com/spatie/laravel-dashboard-calendar-tile
- https://github.com/spatie/laravel-dashboard-twitter-tile
- https://github.com/skydiver/laravel-dashboard-npm
- https://gitlab.com/tjvb/laravel-dashboard-packagist-tile
- https://github.com/jeop10/laravel-dashboard-reddit-tile
- https://github.com/VineVax/laravel-dashboard-uptime-robot-tile

### Helpful Links
- https://docs.spatie.be/laravel-dashboard/v1/adding-tiles/overview/
- https://developer.spotify.com/dashboard/

### File Tree
```bash
dashboard
├── .editorconfig
├── .env.example
├── .gitattributes
├── .gitignore
├── .styleci.yml
├── README.md
├── app
│   ├── Console
│   │   └── Kernel.php
│   ├── Exceptions
│   │   └── Handler.php
│   ├── Http
│   │   ├── Controllers
│   │   │   └── Controller.php
│   │   ├── Kernel.php
│   │   └── Middleware
│   │       ├── Authenticate.php
│   │       ├── CheckForMaintenanceMode.php
│   │       ├── EncryptCookies.php
│   │       ├── RedirectIfAuthenticated.php
│   │       ├── TrimStrings.php
│   │       ├── TrustHosts.php
│   │       ├── TrustProxies.php
│   │       └── VerifyCsrfToken.php
│   ├── Providers
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── BroadcastServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── RouteServiceProvider.php
│   └── User.php
├── artisan
├── bootstrap
│   ├── app.php
│   └── cache
│       ├── .gitignore
│       ├── packages.php
│       └── services.php
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── cors.php
│   ├── dashboard.php
│   ├── database.php
│   ├── filesystems.php
│   ├── hashing.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   ├── session.php
│   └── view.php
├── database
│   ├── .gitignore
│   ├── factories
│   │   └── UserFactory.php
│   ├── migrations
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2014_10_12_100000_create_password_resets_table.php
│   │   ├── 2019_08_19_000000_create_failed_jobs_table.php
│   │   └── 2020_07_11_050634_create_dashboard_tiles_table.php
│   └── seeds
│       └── DatabaseSeeder.php
├── package-lock.json
├── package.json
├── phpunit.xml
├── public
│   ├── .htaccess
│   ├── favicon.ico
│   ├── index.php
│   └── robots.txt
├── resources
│   ├── js
│   │   ├── app.js
│   │   └── bootstrap.js
│   ├── lang
│   │   └── en
│   │       ├── auth.php
│   │       ├── pagination.php
│   │       ├── passwords.php
│   │       └── validation.php
│   ├── sass
│   │   └── app.scss
│   └── views
│       ├── dashboard.blade.php
│       └── welcome.blade.php
├── routes
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── server.php
└── webpack.mix.js

22 directories, 75 files
```

* Tree command can be installed using brew: `brew install tree`
* File tree generated using command `tree -a -I '.git|.env|node_modules|vendor|storage|tests'`

### License
Laravel Dashboard is licensed under the [MIT license](https://opensource.org/licenses/MIT). Enjoy!
