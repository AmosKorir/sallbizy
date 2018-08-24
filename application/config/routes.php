<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['albums']='Welcome/getalbums';
$route['album/:any']='Welcome/getalbumSongs/$1';
$route['category']='Welcome/getAllCategory';
$route['artist']='Welcome/getArtist';
$route['adverts']='Welcome/getAdverts';


// route to the song catgories
$route['genge']='Welcome/genge';
$route['gospel']='Welcome/gospel';
$route['ohangla']='Welcome/ohangla';
$route['bongo']='Welcome/bongo';
$route['afrofussion']='Welcome/afrofussion';

$route['onanda']='Welcome/onanda';
$route['orutu']='Welcome/orutu';
$route['nyatiti']='Welcome/nyatiti';
$route['rhumba']='Welcome/rhumba';
$route['benga']='Welcome/benga';

//subscription route
$route['sub/:any']='Sub/';

$route['balance/:any']='Sub/checkBalance/$';
$route['logout']='AdminLogin/logout';



// above are new routes
$route['auth']='account/auth_user';
$route['register']='account/register_me';
$route['addproduct']='item/create';
$route['newproduct']='item/create';
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
