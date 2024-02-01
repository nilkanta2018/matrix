<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Childpicked extends Model
{
    use HasFactory;
    protected $fillable = [
        'child_name', 
        'date_of_birth', 
        'class',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
        'photo'
    ];    
}