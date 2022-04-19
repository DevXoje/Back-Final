<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;



    protected $table = "customers";
    protected $guard = 'customer';

/*     public function role()
    {
        return $this->hasOne(User::class,'id');
    } */

    protected $fillable = array(
        "address"
    );

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }




















    /**
     * Get the unique identifier for the account.
     * Required by Illuminate\Auth\UserInterface.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the account.
     * Required by Illuminate\Auth\UserInterface.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     * Required by Illuminate\Auth\Reminders\RemindableInterface.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * Some "user-friendly" aliases for the interface methods.  🙂
     */
    public function getAccountId()
    {
        return $this->getAuthIdentifier();
    }

    public function getEmailAddr()
    {
        return $this->getReminderEmail();
    }

    public function getPassword()
    {
        return $this->getAuthPassword();
    }
}
