<?php

require_once dirname(__FILE__).'/../lib/floorGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/floorGeneratorHelper.class.php';

/**
 * floor actions.
 *
 * @package    cms
 * @subpackage floor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class floorActions extends autoFloorActions
{
    public function executeManage(sfWebRequest $request) {
        $this->Floor = $this->getRoute()->getObject();
    }

    public function executeCreatePlace(sfWebRequest $request){
        $tbl = new FloorPlace();
        $tbl->fromArray(array(
            'width' => 4,
            'height' => 4,
            'posx' => 0,
            'posy' => 0,
            'floor_id' => $request->getParameter('id'),
            'restaurant_id' => $this->getUser()->getGuardUser()->getRestaurant()->id
        ));
        $tbl->save();
        return $this->renderText($tbl->id);
    }

    public function executeUpdatePlace(sfWebRequest $request){
        $tbl = Q::f('FloorPlace', $request->getParameter('id'));
        $this->forward404Unless($tbl && $tbl->restaurant_id == $this->getUser()->getRestaurantId());
        $tbl->fromArray($request->getParameter('place'));
        $tbl->save();
        return $this->renderText('1');
    }

    public function executeDeletePlace(sfWebRequest $request){
        $tbl = Q::f('FloorPlace', $request->getParameter('id'));
        $this->forward404Unless($tbl && $tbl->restaurant_id == $this->getUser()->getRestaurantId());
        $tbl->delete();
        return $this->renderText('1');
    }


    public function executeOccupancy(sfWebRequest $request){

            $this->Floor = $this->getRoute()->getObject();

            $dates = $this->getUser()->getAttribute('floor_datesFilter', array());
            $this->date_from = !empty($dates['date_from']) ? $dates['date_from'] : date('Y-m-d');
            $this->date_to = !empty($dates['date_to']) ? $dates['date_to'] : date('Y-m-d', time() + 60 * 60 * 24 * 365);

            $period = P::createDateRangeArray($this->date_from, $this->date_to);
            $this->period = P::createPrintablePeriod($period);

    }

    public function executeFilterDates(sfWebRequest $request){
        $dates = array(
            'date_from' => date('Y-m-d', strtotime($request->getParameter('date_from'))),
            'date_to' => date('Y-m-d', strtotime($request->getParameter('date_to'))),
        );
        $this->getUser()->setAttribute('floor_datesFilter', $dates);
        return $this->redirect($request->getReferer());
    }

}
