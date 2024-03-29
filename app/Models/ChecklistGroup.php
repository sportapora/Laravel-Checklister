<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChecklistGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['checklist_group_id', 'name'];

    public function checklists(): HasMany
    {
        return $this->hasMany(Checklist::class);
    }
}
