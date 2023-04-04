<?php

namespace Tests\Unit\Helpers;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TestRelatedModel extends TestModel
{
    public function testmodel(): BelongsTo
    {
        return $this->belongsTo(TestModel::class);
    }

    public function testmodels(): BelongsToMany
    {
        return $this->belongsToMany(TestModel::class);
    }
}
