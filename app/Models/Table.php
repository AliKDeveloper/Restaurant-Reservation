<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;
class Table extends Model
{
    use HasFactory, Sortable;
    protected $table = 'tables';
    protected $fillable = ['id', 'client', 'reserved_by', 'arrival_time', 'phone', 'note', 'is_reserved', 'updated_at'];
    public $sortable = ['id', 'client', 'reserved_by', 'arrival_time', 'phone', 'is_reserved', 'updated_at'];
}
