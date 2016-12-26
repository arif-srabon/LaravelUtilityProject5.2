<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UtilityController extends Controller
{
    /**
     * Elapsed time
     *
     * Calculates how much time elapsed from a time mentioned.
     *
     * @author  arnorhs
     * @link 	http://stackoverflow.com/a/2916189/1743124
     *
     * @param   string $time Date & Time string.
     * @return  string       Elapsed time.
     * -----------------------------------------------------------------------
     */
    public function time_elapsed( $time ) {
        $time   = strtotime( $time );
        $now    = date( 'Y-m-d H:i:s', time() );
        $time   = strtotime($now) - $time; // to get the time since that moment
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        foreach ( $tokens as $unit => $text ) {
            if ( $time < $unit )
                continue;

            $number_of_units = floor( $time / $unit );
            return $number_of_units .' '. $text . ( ( $number_of_units > 1 ) ? 's' : '' );
        }
    }
}

