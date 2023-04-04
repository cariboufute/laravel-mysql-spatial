<?php

namespace Tests\Unit\Helpers;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

class TestNoSpatialModel extends Model
{
    use SpatialTrait;
}
