<?php
  class Wynik
  {
    private $wynik;
    private $wiersz;

    public function __construct($wynik)
    {
      $this->wynik = $wynik;
      $this->nastepny();
    }

    public function __destruct()
    {
      mysql_free_result($this->wynik);
    }

    public function koniec()
    {
      return ($this->wiersz === false);
    }

    public function podajWiersz()
    {
      return $this->wiersz;
    }

    public function nastepny()
    {
      $this->wiersz = mysql_fetch_array($this->wynik, MYSQL_ASSOC);
    }
  }


  class SQLBaza
  {
    const BLAD_POLACZENIA = 1;
    const BLAD_SELECT = 2;
    const BLAD_ZAPYTANIA = 3;
    const NAZWA_BAZY = 'localhost';
    const UZYTKOWNIK_BAZY = 'user2';
    const HASLO_BAZY = '';

    private $link;

    public function __construct()
    {
      $this->link = false;
    }

    public function __destruct()
    {
      $this->rozlacz();
    }

    public function polacz()
    {

      if ($this->link !== false)
        return true;

      $this->link = mysql_connect(SQLBaza::NAZWA_BAZY,
                                  SQLBaza::UZYTKOWNIK_BAZY,
                                  SQLBaza::HASLO_BAZY);
      if ($this->link === false)
        throw new Exception("Błąd podczas łączenia z bazą danych: " . mysql_error(),
                            SQLBaza::BLAD_POLACZENIA);

      if (mysql_select_db('math', $this->link) == false)
        throw new Exception("Błąd podczas wyboru bazy danych: " . mysql_error(),
                            SQLBaza::BLAD_SELECT);
      
      $this->zapytanie("set names 'utf8'");

      return true;
    }

    public function rozlacz()
    {
      if ($this->link !== false)
      {
        mysql_close($this->link);
        $this->link = false;
      }
    }

    public function czyPolaczona()
    {
      if ($this->link === false)
        return false;

      return true;
    }

    public function zapytanie($p_zapytanie)
    {
      if (!$this->czyPolaczona())
        $this->polacz();

      $l_wynik = mysql_query($p_zapytanie, $this->link);
      if ($l_wynik === false)
        throw new Exception("Błąd podczas wykonywania zapytania '$zapytanie_string'" .
			    mysql_error(), SQLBaza::BLAD_ZAPYTANIA);

      if ($l_wynik === true)
        return true;

      return new Wynik($l_wynik);
    }

    public function wstaw($p_tabela, $p_wartosci)
    {
      $l_kolumny = '( ';
      $l_wartosci = '( ';

      $pierwszy = true;
      while (list($klucz, $wartosc) = each($p_wartosci))
      {
        if ($pierwszy == true)
          $pierwszy = false;
        else
        {
          $l_kolumny .= ', ';
          $l_wartosci  .= ', ';
        }

        $l_kolumny .= $klucz;

        if ($wartosc === NULL)
          $l_wartosci .= 'NULL';
        else
          $l_wartosci .= "'$wartosc'";
      }

      $l_kolumny .= ' )';
      $l_wartosci .= ' )';

      $l_zapytanie = "INSERT INTO $tabela $l_kolumny VALUES $l_wartosci;";

      return $this->zapytanie($l_zapytanie);
    }

    public function wybierz($p_tabela, $p_kolumny, $p_warunki = "")
    {
      $pierwsza = true;
      $l_kolumny = '';
      while (list(, $wartosc) = each($p_kolumny))
      {
        if ($pierwsza == true)
          $pierwsza = false;
        else
          $l_kolumny .= ', ';

        $l_kolumny .= $wartosc;
      }

      $l_zapytanie = "SELECT $l_kolumny FROM $p_tabela $p_warunki;";
      //print $zapytanie_string ."\n";

      return $this->zapytanie($l_zapytanie);
    }

    public function aktualizuj($p_tabela, $p_wartosci, $p_warunki = "")
    {
      $l_wartosci = "";
      $pierwsza = true;
      while (list($klucz, $wartosc) = each($p_wartosci))
      {
        if ($pierwsza == true)
          $pierwsza = false;
        else
          $l_wartosci .= ', ';

        if ($wartosc === NULL)
          $l_wartosci .= $klucz . "=NULL";
        else
          $l_wartosci .= $klucz . "='$value'";
      }

      $l_zapytanie = "UPDATE $table SET $l_wartosci $p_warunki";
      return $this->zapytanie($l_zapytanie);
    }

    public static function import($p_zmienna)
    {
      if ($p_zmienna === NULL)
        return NULL;

      return addslashes($p_zmienna);
    }

    public static function export($p_zmienna)
    {
      if ($p_zmienna === NULL)
        return NULL;

      return stripslashes($p_zmienna);
    }

  }

?>
