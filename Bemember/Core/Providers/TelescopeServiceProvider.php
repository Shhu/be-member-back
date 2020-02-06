<?php

namespace Bemember\Core\Providers;

use Laravel\Telescope\Telescope;
use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    public function register(): void
    {
        // Telescope::night();
        Telescope::filter(function (IncomingEntry $entry) {
            if ($this->app->environment('local')) {
                return true;
            }

            return $entry->isReportableException() ||
                $entry->isFailedJob() ||
                $entry->isScheduledTask() ||
                $entry->hasMonitoredTag();
        });
    }

    protected function gate(): void
    {
        if (!$this->app->environment('local')) {
            \Gate::define('viewTelescope', static function ($user) {
                return in_array($user->email, [
                    'lowscaa@gmail.com',
                ]);
            });
        }
    }
}
