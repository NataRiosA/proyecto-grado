<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroDocumento extends Model
{
    use HasFactory;

	protected $fillable = [
		'name', 'document', 'image'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

	// protected $appends = [
    //     //
	// ];
}
