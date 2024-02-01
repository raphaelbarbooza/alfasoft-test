<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'contact',
        'email_address'
    ];


    /**
     * @return string
     * Return the number with spaces every 3 chars
     */
    public function getFormattedContactNumberAttribute(){
        $number = $this->attributes['contact'];
        $formatted = join(" ",[
            substr($number,0,3),
            substr($number,3,3),
            substr($number,6,3)
        ]);
        return $formatted;
    }

}
