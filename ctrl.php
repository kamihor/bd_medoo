<?php

require_once 'init.php';

getRouter()->setDefaultRoute('calcShow'); // akcja/ścieżka domyślna
getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

getRouter()->addRoute('calcShow', 'CalcCredCtrl',  ['user','admin']);
getRouter()->addRoute('calcCompute', 'CalcCredCtrl',  ['user','admin']);
getRouter()->addRoute('login', 'LoginCtrl');
getRouter()->addRoute('logout', 'LoginCtrl', ['user','admin']);
getRouter()->addRoute('history', 'HistoryCtrl', 'admin');

getRouter()->go();