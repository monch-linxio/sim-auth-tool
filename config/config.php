<?php
session_set_cookie_params(3600,"/");
session_start();

define('ROOT', getcwd());
const DB_FOLDER = ROOT . '/db/';
const WEBSITE = ROOT . '/template/';
