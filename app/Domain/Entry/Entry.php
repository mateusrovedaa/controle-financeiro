<?php

namespace App\Domain\Entry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Category\Category;
use App\Domain\User;
use App\Domain\EntryType\EntryType;

class Entry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'payment_date',
        'status',
        'description',
        'entry_type_id',
        'category_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entrytype()
    {
        return $this->belongsTo(EntryType::class, 'entry_type_id');
    }
}
