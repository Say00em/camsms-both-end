<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendHistory extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'type', 'message', 'category_id'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
