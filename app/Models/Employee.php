<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employee';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'salary',
    ];

    protected $hidden = [
        'id',
        'date_of_birth',
        'birthday_readable',
        'salary',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $appends = ['birthday_readable', 'age', 'salary_local'];

    public function getBirthdayReadableAttribute()
    {
        return Carbon::create($this->date_of_birth)->toFormattedDateString();
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function getSalaryLocalAttribute()
    {
        return env('LOCAL_CURRENCY') . ' ' . $this->attributes['salary'];
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'id');
    }
}
