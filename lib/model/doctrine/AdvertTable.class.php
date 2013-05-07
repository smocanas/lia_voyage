<?php

/**
 * AdvertTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdvertTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdvertTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Advert');
    }
    
    public static function addAdvert($advert = array(), $type = 1)
    {
        $route           = $advert['route']?$advert['route']:false;
        $direction       = $advert['direction']?$advert['direction']:false;
        $nb_places       = $advert['nb_places']?$advert['nb_places']:false;
        $departure_date  = $advert['departure_date']?$advert['departure_date']:false;
        $return_date     = $advert['return_date']?$advert['return_date']:false;
        $departure_place = $advert['departure_place']?$advert['departure_place']:false;
        $time            = $advert['time']?$advert['time']:false;
        $destination     = $advert['destination']?$advert['destination']:false;
        $comment         = $advert['comment']?$advert['comment']:false;
        $departure_date = explode('/', $departure_date);
        $departure_date = $departure_date[2] . '-' . $departure_date[0] . '-' . $departure_date[1];
        $date = $departure_date . ' ' . $time . ':00';
        $obj = new Advert();
        $obj->setTypeId($type);
        if ($route)
        {
            $obj->setTypeRouteId($route);
        }
        
        if ($direction)
        {
            $obj->setDirectionId($direction);
        }
        
        if ($nb_places)
        {
            $obj->setPNumber($nb_places);
        }
        
        if ($departure_date)
        {
            $obj->setTime($date);
        }
        
        if ($departure_place)
        {
            $obj->setStartLocation($departure_place);
        }
        
        if ($destination)
        {
            $obj->setEndLocation($destination);
        }
        
        if ($comment)
        {
            $obj->setComment($comment);
        }
        
        $obj->save();
    }
}