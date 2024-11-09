<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Registration extends Model
{
    use HasFactory;
    protected $primaryKey = 'r_id';

    public function scopeFilter(Builder $query,array $filters) : Builder
    {
        $from = $filters['from'] ?? date('Y-m-d');
        $to = $filters['to'] ?? date('Y-m-d');

        return $query->when(
            $filters['event_id'] ?? false,
            function ($query, $value) {
                return $query->where('registrations.event_id','=', $value);
            }
        )->when(
            $from && $to,
            function ($query) use ($from, $to) {
                $query->whereBetween('r_date', [$from, $to]);
            }
        );
    }

}
