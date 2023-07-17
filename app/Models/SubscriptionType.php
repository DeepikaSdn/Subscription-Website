<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Notifications\Dispatcher;

class SubscriptionType extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'type',
        'amount',
        'days',
        'status','description',
        'createdby',
    ];

    public function routeNotificationForMail($notification)
    {
        $this->email = env('ADMIN_MAILID');

        return $this->email; // Replace 'email' with the actual column name that stores the recipient email address.
    }

}
