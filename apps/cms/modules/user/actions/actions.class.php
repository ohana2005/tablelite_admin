<?php

require_once dirname(__FILE__).'/../lib/userGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/userGeneratorHelper.class.php';

/**
 * user actions.
 *
 * @package    cms
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends autoUserActions
{
    public function executeLoginAs(sfWebRequest $request) {
        $user = $this->getRoute()->getObject();

        $this->getUser()->loginAs($user);

        return $this->redirect('dashboard/index');
    }
}
