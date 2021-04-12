<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program_videos extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function program()
    {
        return $this->belongsTo('App/Models/Programs','program_id');
    }
}
