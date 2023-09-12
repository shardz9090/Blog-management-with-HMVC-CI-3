<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Home
// $route[''] = 'Home/index';
$route['logout'] = 'loginreg/Dbwork/logout';


//login Registration
$route['register'] = 'loginreg/Dbwork/register';
$route['login'] = 'loginreg/Dbwork/login';
// $route['reg_form'] = 'loginreg/reg_form';

//Blogs
$route['post'] = 'blog/Blogops/blog_input';
$route['read_more/(:any)'] = 'blog/Blogops/readblog/$1';
$route['edit'] = 'blog/Blogops/edit';
$route['delete'] = 'blog/Blogops/delete';
$route['delete_blog/(:any)'] = 'blog/Blogops/delete_blog/$1';
$route['edit_blog/(:any)'] = 'blog/Blogops/edit_blog/$1';
$route['onlyme/(:any)'] = 'blog/Blogops/own_blog/$1';
