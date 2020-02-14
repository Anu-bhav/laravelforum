<?php

namespace App;

use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use App\Mail\TokenMail;

class LoginToken extends Model
{
    /**
     * Fillable fields for the model.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'token'];

    /**
     * Generate a new token for the given user.
     *
     * @param  User $user
     * @return $this
     */
    // Returns back to AuthenticatesUser@invite
    public static function generateFor(User $user)
    {
        return static::create([
            'user_id' => $user->id,
            'token'   => str_random(50)
        ]);
    }

    /**
     * Get the route key for implicit model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'token';
    }

    /**
     * Send the token to the user.
     */
    public function send()
    {
        $url = url('/auth/token', $this->token);
        /*
        * The post request from /auth/token will be authenticated in LoginController@authenticate
        *
        */
        // Mail::raw(
        //     "Click the link to login: <a href='{$url}'>{$url}</a>",
        //     function ($message) {
        //         $message->to($this->user->email)
        //             ->subject('Login to my Hacking Forum');
        //     }
        // );

        // $data = array("name" => $this->user->name, "body" => $url);
        // Mail::send('inc.mail', $data, function ($message) {
        //             $message->to($this->user->email)
        //                 ->subject('Login to my Hacking Forum');
        // });
        
        Mail::to($this->user->email)->send(new TokenMail($this->user->name, $url));
    }

    /**
     * A token belongs to a registered user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // Eloquent relationships and techniques - One to One Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this->belongsTo('App\User');
    }
}
