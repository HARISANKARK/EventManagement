<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'e_id';

    public function scopeFilter(Builder $query,array $filters) : Builder
    {
        $from = $filters['from'] ?? null;
        $to = $filters['to'] ?? null;

        return $query->when(
            $from && $to,
            function ($query) use ($from, $to) {
                $query->whereBetween('e_date', [$from, $to]);
            }
        );
    }

}
