<?php

namespace App\Domain\Experience;

use App\Domain\Experience\Enums\ExperienceType;
use App\Domain\Experience\Events\ExperienceEarned;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class ExperienceAggregateRoot extends AggregateRoot
{
    public function add(
        string $email,
        ?int $userId,
        ExperienceType $type,
    ) {
        $this->recordThat(
            new ExperienceEarned(
                email: $email,
                userId: $userId,
                amount: $type->getAmount(),
                type: $type,
            )
        );
        return $this;
    }
}