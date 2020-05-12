<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$config['protocol']     = 'smtp';
$config['smtp_host']    = 'ssl://smtp.googlemail.com';
$config['smtp_port']    = '465';
$config['smtp_timeout'] = '30';
$config['smtp_user']    = 'destaku.kudus@gmail.com';
$config['smtp_pass']    = 'jambolj4ck';
$config['charset']      = 'utf-8';
$config['newline']      = "\r\n";
$config['mailtype']     = 'html';

/* End of file email.php */
/* Location: ./system/application/config/email.php */