<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PermissionHistory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function permission():BelongsTo {
        return $this->belongsTo(Permission::class);
    }

    public function vehicle():BelongsTo {
        return $this->belongsTo(Vehicle::class);
    }

}
