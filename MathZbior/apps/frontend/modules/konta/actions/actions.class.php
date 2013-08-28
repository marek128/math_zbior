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
    $this->login = "";
    $this->logowanie_error = "";

    if($this->getUser()->hasAttribute('login'))
      $this->login = $this->getUser()->getAttribute('login');

    if($this->getUser()->hasAttribute('email'))
      $this->email = $this->getUser()->getAttribute('email');

    if($this->getUser()->hasAttribute('imie'))
      $this->imie = $this->getUser()->getAttribute('imie');

    if($this->getUser()->hasAttribute('nazwisko'))
      $this->nazwisko = $this->getUser()->getAttribute('nazwisko');

    if($this->getUser()->hasFlash('logowanie_error'))
      $this->logowanie_error = $this->getUser()->getFlash('logowanie_error');
  }

  public function executeRejestracja(sfRequest $request)
  {
    $this->reg_error = "";
    $this->login = "";
    $this->email = "";
    $this->imie = "";
    $this->nazwisko = "";

    if($this->getUser()->hasFlash('reg_error'))
      $this->reg_error = $this->getUser()->getFlash('reg_error');

    if($this->getUser()->hasAttribute('login'))
      $this->login = $this->getUser()->getAttribute('login');

    if($this->getUser()->hasAttribute('email'))
      $this->email = $this->getUser()->getAttribute('email');

    if($this->getUser()->hasAttribute('imie'))
      $this->imie = $this->getUser()->getAttribute('imie');

    if($this->getUser()->hasAttribute('nazwisko'))
      $this->nazwisko = $this->getUser()->getAttribute('nazwisko');
  }
  
  public function executeWykRejestracja(sfRequest $request)
  {
    $l_dane = new Uzytkownik();

    $login = $this->getRequestParameter('login');
    $l_dane->email = $this->getRequestParameter('email');
    $l_dane->haslo = $this->getRequestParameter('haslo');
    $l_dane->imie = $this->getRequestParameter('imie');
    $l_dane->nazwisko = $this->getRequestParameter('nazwisko');

    $this->getUser()->setAttribute('login', $login);
    $this->getUser()->setAttribute('email', $l_dane->email);
    $this->getUser()->setAttribute('imie', $l_dane->imie);
    $this->getUser()->setAttribute('nazwisko', $l_dane->nazwisko);

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
      $this->getUser()->setFlash('exception_error', $e->getMessage());
      $this->redirect('bledy/index');
    }
  }

  public function executeZarejestrowany(sfRequest $request)
  {
    $this->login =  $this->getUser()->getAttribute('login');
    $this->email =  $this->getUser()->getAttribute('email');
    $this->imie =  $this->getUser()->getAttribute('imie');
    $this->nazwisko =  $this->getUser()->getAttribute('nazwisko');
   
  }
  
  public function executeWykLogowanie(sfRequest $request)
  {
    $login = $this->getRequestParameter('login');
    $haslo = $this->getRequestParameter('haslo');

    try
    {
      $db = new SQLBaza();
      $status = FunkcjeKonta::sprawdzPrzyLogowaniu($db, $login, $haslo);

      if (FALSE == $status)
      {
        $this->getUser()->getAttributeHolder()->clear();
        $this->getUser()->setAttribute('login', $login);
        $this->getUser()->setFlash('logowanie_error', 'Niepoprawne dane');

        $this->redirect('konta/index');
      }
      else
      {
        $this->getUser()->setAuthenticated(true);
        $this->getUser()->setAttribute('login', $login);

        $this->redirect('tematy/index');
      }
    }
    catch (Exception $e)
    {
      $this->getUser()->setFlash('exception_error', $e->getMessage());
      $this->redirect('bledy/index');
    }
  }

}
