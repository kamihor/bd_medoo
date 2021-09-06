<?php

namespace app\controllers;

use app\forms\CalcCredForm;
use app\transfer\CalcCredResult;

class CalcCredCtrl {

private $form;   //dane formularza (do obliczeń i dla widoku)
private $result; //inne dane dla widoku


public function __construct(){
    
$this->form = new CalcCredForm();
$this->result = new CalcCredResult();
}

//pobranie parametrów
public function getParams(){
$this->form->value = getFromRequest('value');
$this->form->years = getFromRequest('years');
$this->form->percent = getFromRequest('percent');
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(){
    
// sprawdzenie, czy parametry zostały przekazane
if (!(isset($this->form->value) && isset($this->form->years) && isset($this->form->percent))) {
return false;
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $this->form->value == "") {
    getMessages()->addError('Nie podano kwoty');
}
if ( $this->form->years == "") {
    getMessages()->addError('Nie podano okresu spłaty');
}
if ( $this->form->percent == "") {
    getMessages()->addError('Nie podano oprocentowania');
}

if (! getMessages()->isError()) {

if (!is_numeric( $this->form->value )) {
$this->messages->addError('Wartość kwoty nie jest liczbą');
}

if (!is_numeric( $this->form->years )) {
    getMessages()->addError('Okres spłaty nie jest liczbą');
}

if (!is_numeric( $this->form->percent )) {
    getMessages()->addError('Procent nie jest liczbą');
}

}
return ! getMessages()->isError();
}


public function action_calcCompute(){

$this->getParams();

if($this->validate()){

$this->form->value = intval($this->form->value);
$this->form->years = intval($this->form->years);
$this->form->percent = floatval($this->form->percent);
$this->result->result = (1+($this->form->percent)/100)*(($this->form->value)/(($this->form->years)*12));

try {
    $database = new \Medoo\Medoo([
        
        'database_type' => 'mysql',
        'database_name' => 'calc_cred',
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_polish_ci',
        'port' => 3306,
        'option' => [
            \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]
    ]);
    
    $database->insert("wynik", [
        "value" => $this->form->value,
        "years" => $this->form->years,
        "percent" => $this->form->percent,
        "result" => $this->result->result,
        "date" => date("Y-m-d H:i:s")
    ]);
    
    
} catch (\PDOException $ex) {
    getMessages()->addError("DB Error: ".$ex->getMessage());
}



}
$this->generateView();
}

public function action_calcShow(){
		$this->generateView();
	}

public function generateView(){

    getSmarty()->assign('user',unserialize($_SESSION['user']));
    
    getSmarty()->assign('page_title', 'Kalkulator kredytowy');
    getSmarty()->assign('page_description', 'Obliczanie raty kredytu nigdy nie było tak proste!');
    getSmarty()->assign('page_header', 'Nowa struktura');


    getSmarty()->assign('result', $this->result);
    getSmarty()->assign('form', $this->form);


    getSmarty()->display('calc_cred.tpl');
}



}