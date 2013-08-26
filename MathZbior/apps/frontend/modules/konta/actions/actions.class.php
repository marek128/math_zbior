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
  
  public function executeWykRejestracja(sfRequest $request)
  {
    $l_dane = new Uzytkownik();

    $login = $this->getRequestParameter('login');
    $l_dane->email = $this->getRequestParameter('email');
    $l_dane->haslo = $this->getRequestParameter('haslo');
    $l_dane->imie = $this->getRequestParameter('imie');
    $l_dane->nazwisko = $this->getRequestParameter('nazwisko');

    $this->getUser()->setFlash('login', $login);
    $this->getUser()->setFlash('email', $l_dane->email);
    $this->getUser()->setFlash('imie', $l_dane->imie);
    $this->getUser()->setFlash('nazwisko', $l_dane->nazwisko);

    $reg_error = FunkcjeKonta::sprawdzPoprawnosc($login, $l_dane);
    if ("" != $reg_error)
    {
      $this->getUser()->setFlash('reg_error', $reg_error);
      $this->redirect('konta/rejestracja');
    }
    try
    {
      $db = new SQLBaza();

      if (FunkcjeKonta::zarejestruj($db, $login, $l_dane))
      {
        $this->getUser()->setFlash('login', "$login");
        $this->getUser()->setFlash('email', "$l_dane->email");
        $this->getUser()->setFlash('imie', "$l_dane->imie");
        $this->getUser()->setFlash('nazwisko', "$l_dane->nazwisko");
        $this->redirect('konta/zarejestrowany');
      }
      else
      {
        $this->getUser()->setFlash('reg_error', "Konto o podanych danych już istnieje!");
        $this->redirect('konta/rejestracja');
      }
    }
    catch (Exception $e)
    {
    }
  }

  public function executeZarejestrowany(sfRequest $request)
  {
    $this->login =  $this->getUser()->getFlash('login');
    $this->email =  $this->getUser()->getFlash('email');
    $this->imie =  $this->getUser()->getFlash('imie');
    $this->nazwisko =  $this->getUser()->getFlash('nazwisko');
   
  }

}
