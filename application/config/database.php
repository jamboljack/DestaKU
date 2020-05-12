<?php
defined('BASEPATH') or exit('No direct script access allowed');

$active_group  = 'destaku';
$query_builder = true;
$db['destaku'] = array(
    'dsn'          => '',
    'hostname'     => 'localhost:3307',
    'username'     => 'root',
    'password'     => '',
    'database'     => 'db_destaku',
    'dbdriver'     => 'mysqli',
    'dbprefix'     => '',
    'pconnect'     => false,
    'db_debug'     => (ENVIRONMENT !== 'production'),
    'cache_on'     => false,
    'cachedir'     => '',
    'char_set'     => 'utf8',
    'dbcollat'     => 'utf8_general_ci',
    'swap_pre'     => '',
    'encrypt'      => false,
    'compress'     => false,
    'stricton'     => false,
    'failover'     => array(),
    'save_queries' => true,
);
