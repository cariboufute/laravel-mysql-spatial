<?php

namespace Tests\Unit\Helpers;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\MysqlConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mockery;

class TestModel extends Model
{
    use SpatialTrait;

    protected array $spatialFields = ['point'];   // TODO: only required when fetching, not saving

    public $timestamps = false;

    public static $pdo;

    public static function resolveConnection($connection = null)
    {
        if (is_null(static::$pdo)) {
            static::$pdo = Mockery::mock('TestPDO')->makePartial();
        }

        return new MysqlConnection(static::$pdo);
    }

    public function testrelatedmodels(): HasMany
    {
        return $this->hasMany(TestRelatedModel::class);
    }

    public function testrelatedmodels2(): BelongsToMany
    {
        return $this->belongsToMany(TestRelatedModel::class);
    }
}
