<?php

/**
 * bledy actions.
 *
 * @package    MathZbior
 * @subpackage bledy
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bledyActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  *
  * To sluzy do wyswietlania informacji zawartch w exceptionach.
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->exception_error = 
      $this->getUser()->getFlash('exception_error');
  }
}
