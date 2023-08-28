{\rtf1\ansi\ansicpg1252\cocoartf2755
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\froman\fcharset0 Times-Roman;}
{\colortbl;\red255\green255\blue255;\red0\green0\blue0;}
{\*\expandedcolortbl;;\cssrgb\c0\c0\c0;}
\paperw11900\paperh16840\margl1440\margr1440\vieww11520\viewh8400\viewkind0
\deftab720
\pard\pardeftab720\partightenfactor0

\f0\fs26 \cf0 \expnd0\expndtw0\kerning0
<?php\
\
echo \'93\uc0\u1570 \u1740 \u8204 \u1662 \u1740  \u1588 \u1605 \u1575 : \'94;\
\
echo $_SERVER["REMOTE_ADDR"];\
\
function get_ip_address() \{\
  // check for shared internet/ISP IP\
  if (!empty($_SERVER['HTTP_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_CLIENT_IP']))\
   return $_SERVER['HTTP_CLIENT_IP'];\
\
  // check for IPs passing through proxies\
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) \{\
   // check if multiple ips exist in var\
    $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);\
    foreach ($iplist as $ip) \{\
     if ($this->validate_ip($ip))\
      return $ip;\
    \}\
   \}\
\
  if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED']))\
   return $_SERVER['HTTP_X_FORWARDED'];\
  if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))\
   return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];\
  if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR']))\
   return $_SERVER['HTTP_FORWARDED_FOR'];\
  if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED']))\
   return $_SERVER['HTTP_FORWARDED'];\
\
  // return unreliable ip since all else failed\
   return $_SERVER['REMOTE_ADDR'];\
 \}\
\
function validate_ip($ip) \{\
     if (filter_var($ip, FILTER_VALIDATE_IP, \
                         FILTER_FLAG_IPV4 | \
                         FILTER_FLAG_IPV6 |\
                         FILTER_FLAG_NO_PRIV_RANGE | \
                         FILTER_FLAG_NO_RES_RANGE) === false)\
         return false;\
     self::$ip = $ip;\
     return true;\
 \}\
?>}