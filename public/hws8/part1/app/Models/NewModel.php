<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewModel extends Model
{
    use HasFactory;

    protected $fillable = ['summary', 'short_description', 'full_text', 'image_path'];
}