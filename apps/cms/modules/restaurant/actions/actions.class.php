<?php

require_once dirname(__FILE__).'/../lib/restaurantGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/restaurantGeneratorHelper.class.php';

/**
 * restaurant actions.
 *
 * @package    cms
 * @subpackage restaurant
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class restaurantActions extends autoRestaurantActions
{
    public function executeAdmin(sfWebRequest $request) {
        $this->Restaurant = Q::f('Restaurant', $request->getParameter('id'));
        $this->forward404Unless($this->Restaurant);
        ;
        $this->User = $this->Restaurant->getAdmin();
        $this->form = new sfGuardUserFormRestaurantAdmin($this->User, array('Restaurant' => $this->Restaurant));
//        $this->form->setHotel($this->Hotel);

        if($request->isMethod('post')){
            $this->form->bind($request->getParameter($this->form->getName()));
            if($this->form->isValid()){
                $this->form->save();

                $this->getUser()->setFlash('notice', T::__('Data saved'));
                return $this->redirect('restaurant/index');
            }
        }
    }

    public function executeLoginAs(sfWebRequest $request){
        $this->Restaurant = $this->getRoute()->getObject();

        if(!$this->Restaurant->admin_id){
            return $this->redirect('restaurant/admin?id=' . $this->Restaurant->id);
        }
        $this->getUser()->loginAs($this->Restaurant->getAdmin());

        return $this->redirect('dashboard/index');
    }
}
