<?php

namespace Bemember\Core\Kernels;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Console extends ConsoleKernel
{
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule): void
    {
        //
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
    }
}
