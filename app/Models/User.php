<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;
use Session;

/**
 * A class defining a user. With kth_username and so on.
 *
 * @author Jonas Dahl <jonadahl@kth.se>
 * @version 2016-11-22
 */
class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'kth_username', 'ugkthid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function suggestions() {
        return $this->belongsToMany('App\Models\Suggestion');
    }

    public static function createFromKthUsername($username) {
        $user = self::where('kth_username', $username)->first();
        if ($user != null) {
            return $user;
        }
        $json = json_decode(file_get_contents('https://hodis.datasektionen.se/uid/' . $username));
        $names = explode(" ", $json->cn);
        return User::create([
            'last_name' => $names[count($names) - 1], 
            'first_name' => implode(" ", array_splice($names, 0, -1)), 
            'ugkthid' => $json->ugKthid, 
            'kth_username' => $json->uid, 
            'email' => $json->uid . '@kth.se'
        ]);
    }
}
