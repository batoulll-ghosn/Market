<?php

/*
 * Copyright Humbly Arrogant Software Limited 2023-2024.
 *
 * Use of this software is governed by the Functional Source License, Version 1.1, Apache 2.0 Future License included in the LICENSE.md file and at https://github.com/BillaBear/billabear/blob/main/LICENSE.
 */

namespace App\Subscription\Schedule;

use Parthenon\Billing\Entity\Subscription;

class WeekScheduler implements SchedulerInterface
{
    public function scheduleNextDueDate(Subscription $subscription): void
    {
        $date = clone ($subscription->getValidUntil() ?? $subscription->getCreatedAt());
        $date->modify('+7 days');

        $subscription->setValidUntil($date);
    }
}