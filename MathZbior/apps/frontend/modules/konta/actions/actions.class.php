<?php

/**
 * konta actions.
 *
 * @package    MathZbior
 * @subpackage konta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class kontaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeRejestracja(sfRequest $request)
  {
    $this->reg_error = $this->getUser()->getFlash('reg_error');
  }
}
