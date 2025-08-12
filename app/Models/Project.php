<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'value',
        'description',
        'user_id',
        'city',
        'is_active',
        'contract_name',
        'contract_date',
        'contract_amount',
        'agent_percentage',
        'planned_completion_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'is_active' => 'boolean',
            'contract_date' => 'date',
            'planned_completion_date' => 'date',
            'contract_amount' => 'decimal:2',
            'agent_percentage' => 'decimal:2',
        ];
    }

    /**
     * Get the user that owns the project.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
