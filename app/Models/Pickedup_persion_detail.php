<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pickedup_persion_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'child_id', 
        'person_name', 
        'relation',
        'contact_no'
    ];    
}