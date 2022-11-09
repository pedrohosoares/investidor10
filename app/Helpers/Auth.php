<?php
if(!function_exists('returnNameOfUserLogged')):

    function returnNameOfUserLogged() : string
    {
        return Auth()->user()->name;
    }

endif;


if(!function_exists('returnNameOfEmailLogged')):

    function returnNameOfEmailLogged() : string
    {
        return Auth()->user()->email;
    }

endif;
