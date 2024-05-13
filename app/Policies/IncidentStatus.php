<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentStatus extends Model
{
    protected $table = 'incidentstatus';
	protected $dates = ['deleted_at'];
}
