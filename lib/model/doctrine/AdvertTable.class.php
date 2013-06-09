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
        $id              = $advert['advertId']?$advert['advertId']:false;
        $route           = $advert['route']?$advert['route']:false;
        $direction       = $advert['direction']?$advert['direction']:false;
        $nb_places       = $advert['nb_places']?$advert['nb_places']:false;
        $departure_date  = $advert['departure_date']?$advert['departure_date']:false;
        $return_date     = $advert['return_date']?$advert['return_date']:false;
        $departure_place = $advert['departure_place']?$advert['departure_place']:false;
        $time            = $advert['time']?$advert['time']:false;
        $destination     = $advert['destination']?$advert['destination']:false;
        $comment         = $advert['comment']?$advert['comment']:false;
        $date = $departure_date . ' ' . $time . ':00';
        $obj = new Advert();
        if ($id)
        {
            $obj->assignIdentifier($id);
        }
        $obj->setTypeId($type);
        if ($route)
        {
            $obj->setTypeRouteId($route);
        }
        
        if ($direction)
        {
            $obj->setDirectionId($direction);
        }
        
        if ($departure_date)
        {
            $obj->setDepartureDate($departure_date);
        }
        
        if ($return_date)
        {
            $obj->setReturnDate($return_date);
        }
        
        if ($time)
        {
            $obj->setTime($time);
        }
        
        if ($nb_places)
        {
            $obj->setPNumber($nb_places);
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
        return $obj;
    }
    
    public static function search($word)
    {
        $query = Doctrine_Query::create()
                ->select('*')
                ->from('Advert a')
                ->where('a.start_location LIKE "%' . $word . '%"')
                ->orWhere('a.end_location LIKE "%' . $word . '%"')
                ->orWhere('a.middle_location LIKE "%' . $word . '%"')
                ->execute();
        
        return $query;
    }
    
    public static function advancedSearch($params)
    {
        $q = Doctrine_Manager::getInstance()->getCurrentConnection();
        
        $query = '
            SELECT * FROM advert a
            WHERE 1
        ';
        if ($params['route'])
        {
            $query .= ' AND a.type_route_id=' . $params['route'];
        }
        
        if ($params['direction'])
        {
            $query .= ' AND a.direction_id=' . $params['direction'];
        }
        
        if ($params['nb_places'])
        {
            $query .= ' AND a.p_number=' . $params['nb_places'];
        }
        
        if ($params['departure_date'])
        {
            $isValide = false;
            if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $params['departure_date'])){
                $isValide = true;
            }
            if ($isValide == true)
            {
                $query .= ' AND a.departure_date="' . $params['departure_date'] . '"';
            }
        }
        
        if ($params['return_date'])
        {
            $isValide = false;
            if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $params['return_date'])){
                $isValide = true;
            }
            if ($isValide == true)
            {
                $query .= ' AND a.return_date="' . $params['return_date'] . '"';
            }
        }
        
        if ($params['departure_place'])
        {
            $query .= ' AND a.start_location="' . $params['departure_place'] . '"';
        }
        
        if ($params['destination'])
        {
            $query .= ' AND a.end_location="' . $params['destination'] . '"';
        }
        
        
        $results = $q->execute($query)->fetchAll();
        $objArray = array();
        foreach ($results as $key => $values)
        {
            $obj = new stdClass();
            foreach ($values as $item => $value)
            {
                $obj->$item = $value;
            }
            $objArray[$key] = $obj;
            unset($obj);
        }
        
        return $objArray;
    }
    
    public function removeAdvert($id, $user)
    {
        $advert = AdvertTable::getInstance()->find($id);
        if ($advert->getCreatedBy() == $user)
        {
            $advert->delete();
        }
    }
}