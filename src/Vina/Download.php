<?php

namespace Vina;

class Download
// {
//     public $last = false;
//     public function __construct($lib, $site)
//     {
//         $this->lib = $lib;
//         $this->site = $site;
//     }
//     public function exploder($del, $data, $i)
//     {
//         $a = explode($del, $data);
//         return $a[$i];
//     }
//     public function isredirect($data)
//     {
//         if (preg_match('/ocation: (.*)/', $data, $match)) {
//             $this->redirect = trim($match[1]);
//             return true;
//         } else {
//             return false;
//         }
//     }
//     public function passredirect($data, $cookie)
//     {
//         if (stristr($data, "302 Found") && stristr($data, "ocation")) {
//             preg_match('/ocation: (.*)/', $data, $match);
//             $data = $this->lib->curl(trim($match[1]), $cookie, "");
//         }
//         return $data;
//     }
//     public function parseForm($data)
//     {
//         $post = array();
//         if (preg_match_all('/<input(.*)>/U', $data, $matches)) {
//             foreach ($matches[0] as $input) {
//                 if (!stristr($input, "name=")) {
//                     continue;
//                 }
//                 if (preg_match('/name=(".*"|\'.*\')/U', $input, $name)) {
//                     $key = substr($name[1], 1, -1);
//                     if (preg_match('/value=(".*"|\'.*\')/U', $input, $value)) {
//                         $post[$key] = substr($value[1], 1, -1);
//                     } else {
//                         $post[$key] = "";
//                     }
//                 }
//             }
//         }
//         return $post;
//     }
//     public function linkpassword($url)
//     {
//         $password = "";
//         if (strpos($url, "|")) {
//             $linkpass = explode('|', $url);
//             $url = $linkpass[0];
//             $password = $linkpass[1];
//         }
//         if (isset($_POST['password'])) {
//             $password = $_POST['password'];
//         }
//         return array(
//             $url,
//             $password,
//         );
//     }
//     public function General($url)
//     {
//         $this->url = $url;
//         $this->lib->url = $url;
//         $this->cookie = "";
//         if ($this->lib->acc[$this->site]['proxy'] != "") {
//             $this->lib->proxy = $this->lib->acc[$this->site]['proxy'];
//         }
//         if (method_exists($this, "PreLeech")) {
//             $this->PreLeech($this->url);
//         }
//         if (method_exists($this, "FreeLeech")) {
//             $link = $this->FreeLeech($this->url);
//             if ($link) {
//                 $link = $this->forcelink($link, 2);
//                 if ($link) {
//                     return $link;
//                 }
//             }
//         }
//         $maxacc = count($this->lib->acc[$this->site]['accounts']);
//         if ($maxacc == 0) {
//             $this->error('noaccount', true);
//         }
//         for ($k = 0; $k < $maxacc; $k++) {
//             $account = trim($this->lib->acc[$this->site]['accounts'][$k]);
//             if (stristr($account, ':')) {
//                 list($user, $pass) = explode(':', $account);
//             } else {
//                 $cookie = $account;
//             }
//             if (!empty($cookie) || (!empty($user) && !empty($pass))) {
//                 for ($j = 0; $j < 2; $j++) {
//                     if (($maxacc - $k) == 1 && $j == 1) {
//                         $this->last = true;
//                     }
//                     if (empty($cookie)) {
//                         $cookie = $this->lib->get_cookie($this->site);
//                     }
//                     if (empty($cookie)) {
//                         $cookie = false;
//                         $f = true;
//                         if (method_exists($this, "Login")) {
//                             list($f, $cookie) = $this->Login($user, $pass);
//                         }
//                     }
//                     if (!$cookie) {
//                         continue;
//                     }
//                     $this->save($cookie, true, $f);
//                     if (method_exists($this, "CheckAcc")) {
//                         $status = $this->CheckAcc($this->lib->cookie);
//                     } else {
//                         $status = array(
//                             true,
//                             "Without Acc Checker",
//                         );
//                     }
//                     if ($status[0]) {
//                         $link = false;
//                         if (method_exists($this, "Leech")) {
//                             $link = $this->Leech($this->url);
//                         }
//                         if ($link) {
//                             $link = $this->forcelink($link, 3);
//                             if ($link) {
//                                 return $link;
//                             }
//                         } else {
//                             $this->error('pluginerror');
//                         }
//                     } else {
//                         $this->error($status[1]);
//                     }
//                 }
//             }
//         }
//         return false;
//     }
//     public function forcelink($link, $a)
//     {
//         $link = str_replace(" ", "%20", $link);
//         for ($i = 0; $i < $a; $i++) {
//             if ($size = $this->lib->getsize($link, $this->lib->cookie) <= 0) {
//                 $link = $this->getredirect($link, $this->lib->cookie);
//             } else {
//                 return $link;
//             }
//         }
//         $this->error("cantconnect", false, false);
//         return false;
//     }
//     public function getredirect($link, $cookie = "")
//     {
//         $data = $this->lib->curl($link, $cookie, "", -1);
//         if (preg_match('/ocation: (.*)/', $data, $match)) {
//             $link = trim($match[1]);
//         }
//         $cookies = $this->lib->GetCookies($data);
//         if ($cookies != "") {
//             $this->save($cookies);
//         }
//         return $link;
//     }
//     public function save($cookies = "", $save = true, $filter = true)
//     {
//         $cookie = "";
//         if ($cookies != "") {
//             if ($filter) {
//                 $cookie = $this->filter_cookie(($this->lib->cookie ? $this->lib->cookie . ";" : "") . $cookies);
//             } else {
//                 $cookie = $cookies;
//             }
//         }
//         if ($save) {
//             $this->lib->save_cookies($this->site, $cookie);
//         }
//         $this->lib->cookie = $cookie;
//     }
//     public function filter_cookie($cookie, $del = array('', '""', 'deleted'))
//     {
//         $cookie = explode(";", $cookie);
//         $cookies = "";
//         $a = array();
//         foreach ($cookie as $c) {
//             $delete = false;
//             $pos = strpos($c, "=");
//             $key = str_replace(" ", "", substr($c, 0, $pos));
//             $val = substr($c, $pos + 1);
//             foreach ($del as $dul) {
//                 if ($val == $dul) {
//                     $delete = true;
//                 }
//             }
//             if (!$delete) {
//                 $a[$key] = $val;
//             }
//         }
//         foreach ($a as $b => $c) {
//             $cookies .= "{$b}={$c}; ";
//         }
//         return $cookies;
//     }
//     public function error($msg, $force = false, $delcookie = true, $type = 1)
//     {
//         if (isset($this->lib->lang[$msg])) {
//             $msg = sprintf($this->lib->lang[$msg], $this->site, $this->url);
//         }
//         $msg = sprintf($this->lib->lang["error{$type}"], $msg, $this->url);
//         if ($delcookie) {
//             $this->save();
//         }
//         if ($force || $this->last) {
//             die($msg);
//         }
//     }
}