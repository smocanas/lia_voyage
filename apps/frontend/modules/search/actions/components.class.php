<?php

/**
 * search actions.
 *
 * @package    voyage
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchComponents extends sfComponents {

    public function executeSearchForm(sfWebRequest $request)
    {
        if (!$this->s2)
        {
            $this->s2 = 'Cauta...';
        }
        
    }
}
