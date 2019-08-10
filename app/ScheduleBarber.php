<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleBarber extends Model
{
    protected $fillable = ['id', 'barber_id', 'user_id', 'costumer_id', 'service_id', 'schedule_at'];

    public function service()
    {
        return $this->hasOne(Service::class, 'id','service_id');
    }

    public function barber_user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function customer()
    {
        return $this->hasOne(Costumer::class, 'id','costumer_id');
    }
}
