<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul_surat', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%')
                ->orWhere('tanggal_surat', 'like', '%' . $search . '%')
                ->orWhere('no_surat', 'like', '%' . $search . '%');
        });
        $query->when($filters['searchDate'] ?? false, function ($query, $search) {
            return $query->where('tanggal_surat', 'like', '%' . $search . '%');
        });
    }

    public function instance()
    {
        return $this->belongsTo(Instance::class, 'asal_surat');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
