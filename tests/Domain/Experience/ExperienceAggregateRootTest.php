<?php

namespace Tests\Domain\Experience;

use App\Domain\Experience\Enums\ExperienceType;
use App\Domain\Experience\Projections\UserExperienceProjection;
use App\Domain\Experience\ExperienceAggregateRoot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ExperienceAggregateRootTest extends TestCase
{
    use RefreshDatabase;
    #[Test]
    public function test_add()
    {
        $uuid = Str::uuid()->toString();
        $experienceAggregateRoot = ExperienceAggregateRoot::retrieve($uuid);
        $experienceAggregateRoot->add(
            'test@asd.com',
            null,
            ExperienceType::PullRequest(),
        )->persist();

        $this->assertDatabaseHas((new UserExperienceProjection())->getTable(), [
            'email' => 'test@asd.com',
            'amount' => ExperienceType::PullRequest()->getAmount(),
        ]);
    }
}