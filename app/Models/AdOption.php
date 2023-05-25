<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdOption extends Model
{
    use HasFactory;

    protected $fillable=['ad_id','option_id','option_details_id','input_value'];

    public function ad()
    {
        return $this->belongsTo(Ad::class,'ad_id');
    }
    public function option_details()
    {
        return $this->belongsTo(OptionDetails::class,'option_details_id');
    }

    public function option()
    {
        return $this->belongsTo(Option::class,'option_id');
    }
}
