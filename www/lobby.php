<?php 
session_start(); # Подключается сессия 
# Если сессии new_session нет, то переадресовывается пользователь на главную 
# Нужно что бы пользователи, которые не авторизировались, не могли просматривать страницы игры 
if (empty($_SESSION['new_session'])) { 
      header("Location: index.php"); 
      exit; 
} 

$a = $_GET['a']; 

if (empty($a)) $a = 'main'; 

if ($a == 'exit') { 
      session_destroy(); # Уничтожается сессия и переадресовывается пользователь на главную 
      header("Location: index.php"); 
      exit; 
} 
# Читается url и происходит сравнение со словами в массиве 
# Если сравнение не найдено, автоматически подключается главная игровая страница 
# В другом случае подключается найденый модуль 
$modules = array('start','rating','settings','exit'); 

$module_find = false; 
foreach($modules as $val) { 
      if ($a == $val) { 
       $module_find = true; 
       break; 
      } 
} 

if ($module_find == false) $a = 'main'; 
# Функция переадресации 
function go2page($uri) { 
      die("<script>location.href='".$uri."';</script>"); 
} 

include('inc/db.php'); # Подключается класс БД 
$db = new db; # Создается переменная для работы с классом БД 
$start_time = microtime(true); # Запоминается время до начала выполнения скрипта. Узнаем сколько времени будет исполняться скрипт. Нужно для отслеживания долговыполняемых скриптов 
$mem_start = memory_get_usage(); # Запоминается потребление памяти до начала выполнения скрипта 

include('module/header.php'); # Подключается шапка игры 
include('module/'.$a.'.php'); # Подключается игровой модуль 
include('module/footer.php'); # Подключается подвал игры 

$db->time_load_page = microtime(true) - $start_time; # Запоминается время после выполнения скрипта и отнимает время начала скрипта. Получается полное время выполнения скрипта 
$db->mem_start = memory_get_usage() - $mem_start; # Запоминается потребление памяти после выполнения скрипта 
echo "<br><br><hr><br>".$db->debug(); # Выводится отладочная информация 
?>