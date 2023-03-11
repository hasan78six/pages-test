<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Pages extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'slug',
        "title",
        "content",
        "priority",
        "created_at",
        "updated_at"
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static function getNextRecordId()
    {
        try {
            $id = Pages::latest()->first();
            return empty($id) ? 1 : $id;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function parent()
    {
        return $this->belongsTo(Pages::class)->with("parent");
    }


}
