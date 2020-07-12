<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command(\Spatie\TimeWeatherTile\Commands\FetchOpenWeatherMapDataCommand::class)->everyMinute();
        $schedule->command(\Spatie\TimeWeatherTile\Commands\FetchBuienradarForecastsCommand::class)->everyMinute();
        $schedule->command(Spatie\CalendarTile\FetchCalendarEventsCommand::class)->everyMinute();
        $schedule->command(\Ashbakernz\SpotifyTile\FetchDataFromSpotifyCommand::class)->everyMinute();
        $schedule->command(\Ashbakernz\SpotifyTile\RefreshAccessTokenSpotifyCommand::class)->everyFifteenMinutes();
        $schedule->command(\VineVax\UptimeRobotTile\Commands\FetchUptimeRobotDataCommand::class)->everyFiveMinutes();
        $schedule->command(\TJVB\PackagistTile\FetchPackageDataCommand::class)->twiceDaily();
        $schedule->command(\TJVB\PackagistTile\FetchVendorPackagesCommand::class)->daily();
        $schedule->command(Dustycode\RedditTile\ListenForRedditPostsCommand::class)->everyMinute();
        $schedule->command(\TylerWoonton\HealthCheckTile\Commands\FetchHealthCheckDataCommand::class)->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
