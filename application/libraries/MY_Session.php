<?php

class MY_Session extends CI_Session {
    public function __construct($params = array())
    {
            parent::CI_Session($params);
    }

    public function sess_update()
    {
            if ( IS_AJAX )
            {
                    parent::sess_update();
            }
    }
}