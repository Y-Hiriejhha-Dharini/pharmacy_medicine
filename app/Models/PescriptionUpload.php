<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drugs;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class PescriptionUpload extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function drug_id() :BelongsTo
    {
        return $this->belongsTo(Drugs::class, 'drug_id');
    }
}
