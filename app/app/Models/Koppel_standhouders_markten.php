<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koppel_standhouders_markten extends Model
{
    protected $table = "standhouders";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['markt_id', 'standhouder_id'];



}
