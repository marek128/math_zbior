<?php

/**
 * tematy actions.
 *
 * @package    MathZbior
 * @subpackage tematy
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tematyActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $authenticated = $this->getUser()->isAuthenticated();
    
    if(!$authenticated)
    {
      $this->redirect('konta/index');
    }
    $this->login = $this->getUser()->getAttribute('login');
  }
}
