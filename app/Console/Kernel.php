<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
      \App\Console\Commands\DailyIncomeDis::class,
      \App\Console\Commands\LevelIncomeDis::class,
      \App\Console\Commands\RewardRankGeneration::class,
      \App\Console\Commands\RoyalityRankGeneration::class,
      \App\Console\Commands\RoyalityWeeklyIncomeDis::class,
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:daily-income-dis')->daily();
        $schedule->command('app:level-income-dis')->daily();
        $schedule->command('app:reward-rank-generation')->everyTenMinutes();
        $schedule->command('app:royality-rank-generation')->everyTenMinutes();
        $schedule->command('app:royality-weekly-income-dis')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
