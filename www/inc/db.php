<?php
/*
              * ����� ���� ������
              *
              */

class db {
                           
              public $time_load_page; # ����� ���������� �������
              public $mem_start; # ����������� ������ ��� ���������� �������
              public $mem_pek_start; # ������� ����������� ������ ��� ���������� �������
                           
              const DB_HOST = "localhost"; # mysql ����
              const DB_USER = "root"; # mysql ������������
              const DB_PASS = ""; # mysql ������
              const DB_NAME = "quiz"; # �� mysql
                           
              private $counter_mysql = 0; # ���������� ��������
              private $timer_mysql = 0; # ����� ����� ��������
                 private $mysql_query_desc; # ������ ��������
              # ���������� � �� � ������ ������
              public function __construct() {
               $connect = mysql_connect(self::DB_HOST, self::DB_USER, self::DB_PASS) or die("���� ������ ���� � ����");
               mysql_select_db(self::DB_NAME,$connect) or die("���������� ����� ��");
               # ��������� ����� ������ � ��
               mysql_query("SET NAMES utf8");
              }
                           
              # ��������� �������
              # @query:String - mysql ������
              public function q($query)              
              {
               $this->mysql_query_desc[] = $query; # ����������� ������ � ������ ��������
               $this->counter_mysql++; # ������������� ���������� ��������
               # ��������� ����� ���������� �������
               $start = microtime(true);
               $result = mysql_query($query);
               $this->timer_mysql += microtime(true)-$start;
               # ������������ ���������� mysql ������
               return $result;
              }
              # ��������� ���������� ����
              public function debug()
                 {
               $txt = "";
               $txt .= "������ �������� �� ".$this->time_load_page." ���.<br>\n";
               $txt .= "���������� �������� � ��: ".$this->counter_mysql."<br>\n";
               $txt .= "����� �������� � ��: ".round($this->timer_mysql,4)."<br>\n";
               $txt .= "������ ��������<br>\n<div>";
               $len = sizeof($this->mysql_query_desc);
               for ($i=0;$i<$len;$i++) {
                $txt .= "[".($i+1)."] ".$this->mysql_query_desc[$i]."<br>\n";
               }
               $txt .= "</div>";
               if ( function_exists('memory_get_usage') ) {
                $type = "Kb";
                $num = round($this->mem_start/1024, 2);
                if ($num > 1024) {
                 $type = "Mb";
                 $num = round($this->mem_start/1024/1024, 2);
                }
                $txt .= "����������� ������: ".$num.$type." <br>\n";
               }
                            
               return $txt;
                 }
                           
}

?>