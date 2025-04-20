<?php

namespace App\Domain\Experience\Projections;

use Spatie\EventSourcing\Projections\Projection;

class UserExperienceProjection extends Projection
{
    protected $table = 'user_experiences';

    protected $cast = [
        'amount' => 'integer',
        'type' => ExperienceType::class,
    ];

    protected $fillable = [
        'email',
        'amount',
        'type',
    ];
}