<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utils
 *
 * @author smocanas
 */
class Utils {
   public static function getAdvertNumber($persons)
   {
       if ($persons == 1)
        {
            $textPlace = '1 loc';
        }
        else if ($persons > 1)
        {
            $textPlace = $persons . ' locuri';
        }
        else
        {
            $textPlace = 'Nici un loc';
        }
        
        return $textPlace;
   }
   
   public static function getUserName($id)
   {
       $user = sfGuardUserTable::getInstance()->find($id);
       if ($user->getFirstName() && $user->getLastName())
       {
           return $user->getFirstName() . ' ' . $user->getLastName();
       }
       else
       {
           return $user->getUsername();
       }
   }
}

?>
