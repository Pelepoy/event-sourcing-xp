<?php

namespace App\Domain\Experience\Projectors;

use App\Domain\Experience\Events\ExperienceEarned;
use App\Domain\Experience\Projections\UserExperienceProjection;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;


class UserExperienceProjectors extends Projector
{
    public function onExperienceAdded(ExperienceEarned $event): void
    {
        // Handle the event and update the projection
        UserExperienceProjection::new()
            ->writeable()
            ->create([
                'amount' => $event->amount,
                'email' => $event->email,
                'type' => $event->type,
                'user_id' => $event->userId,
            ]);
    }
}