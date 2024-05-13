<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionSite extends Model
{
    protected $table = 'promotion_site';
	protected $dates = ['deleted_at'];
}
