<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machineries extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'machineries';

    public function machinery_categories()
    {
        return $this->hasOne(MachineryCategories::class, 'id', 'machinery_category_id');
    }

    public function images()
    {
        return $this->hasMany(MachineryImages::class, 'machinery_id', 'id');
    }

    public function machinery_image()
    {
        return $this->hasOne(MachineryImages::class, 'machinery_id', 'id');
    }

    public function machinery_labels()
    {
        return $this->hasMany(MachineryLabels::class, 'machinery_id', 'id');
    }

    public function status(){

        $status = 'Inactive';
        $statusClass = 'bg-warning';

        if ($this->status == 1){
            $status = 'Active';
            $statusClass = 'bg-success';
        }

        return (Object)[
            'text' => $status,
            'class' => $statusClass,
        ];
    }
}
