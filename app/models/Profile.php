<?php

class Profile extends Eloquent 

{
	protected $guarded = array();

	public static $rules = array();
	    protected $hidden = array('password');

	 /**
    * Get the unique identifier for the user.
    *
    * @return mixed
    */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
    * Get the password for the user.
    *
    * @return string
    */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
    * Get the e-mail address where password reminders are sent.
    *
    * @return string
    */
    public function getReminderEmail()
    {
        return $this->email;
    }
}
