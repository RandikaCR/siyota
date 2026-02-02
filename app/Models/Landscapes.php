<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landscapes extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'landscapes';

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
