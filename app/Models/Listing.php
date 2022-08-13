<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Listings\ListingEloquentRepository;

class Listing extends Model
{
    use HasFactory;
    // Table
    protected $table = 'listings';

    // Primary Key
    public $primaryKey = 'id';

    protected $fillable = [
        'title',
        'tags',
        'company',
        'location',
        'email',
        'website',
        'description',
        'company_image'
    ];

    public function scopeFilter($query, array $filters)
    {
        // if tag exists
        if ($filters['tag'] ?? false) {
            // query where tags from DB match request from tag search
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // if search exist
        if ($filters['search'] ?? false) {
            // query where title from DB match request from tag search
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // this listing belongs to
    }
}
