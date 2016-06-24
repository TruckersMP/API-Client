<?php
/**
 * Created by PhpStorm.
 * User: thor
 * Date: 24.06.16
 * Time: 11:19
 */

namespace TruckersMP\Exceptions;

class PlayerNotFoundException extends \Exception
{

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
