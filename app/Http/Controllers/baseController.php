<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class baseController extends Controller
{
    public function msgValidator( $validator )
    {
        $rpta = '';
        foreach( $validator->messages()->all() as $msg )
        {
            $rpta .= $msg.'<br> ';
        }
        return substr( $rpta , 0 , -1 );
    }

    public function warningException( $description , $function , $line , $file , $sendMail = 0 )
    {
        Log::error( $description );
        if( $sendMail === 1 )
        {
            Mail::send( 'soporte' , array( 'description' => $description , 'function' => $function , 'line' => $line , 'file' => $file ) , 
            function( $message ) use( $function )
            {
                $message->to( [ SOPORTE_EMAIL_1 => POSTMAN_USER_NAME_1 /*, SOPORTE_EMAIL_2 => POSTMAN_USER_NAME_2 */ ] )
                ->subject( warning.' - Function: '. $function );      
            });
            return array( status => error , description => $description );
        }
        else
        {
            return array( status => warning , description => $description );
        
        }
    }
}
