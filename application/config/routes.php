<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Auth_ctrl/signin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// admin
$route['Auth4r9x'] = 'Auth_ctrl/do_signin';
$route['Dismiss_1vqn'] = 'Auth_ctrl/signout';
$route['Base_8nvp'] = 'Auth_ctrl/goto_home';
$route['Info_a7xk'] = 'Admin_ctrl/information';
$route['View_add_v3sw'] = 'Admin_ctrl/view_add_information';
$route['Init_r0kc'] = 'Admin_ctrl/add_employee';
$route['Open_z3bt/(:any)'] = 'Admin_ctrl/open_information/$1';
$route['Alter_z3bt'] = 'Admin_ctrl/update_employee';
$route['Token_m4tz'] = 'Admin_ctrl/leavecredits';
$route['Tokenreq_m4tz'] = 'Admin_ctrl/leaverequest';
$route['Cmpy_k5hc'] = 'Admin_ctrl/companies';
$route['Clients_m9xp/(:any)'] = 'Admin_ctrl/clients/$1';
$route['Atnd_n5gw'] = 'Admin_ctrl/attendance';
$route['Atndfile_n5gw/(:any)'] = 'Admin_ctrl/attendance_data/$1';
$route['Roster_k0jb'] = 'Admin_ctrl/schedule';
$route['Accounts_j8vq'] = 'Admin_ctrl/accounts';

// staff
$route['Sbase_8nvp'] = 'Staff_ctrl/goto_home';
$route['Satnd_n5gw'] = 'Staff_ctrl/attendance';
$route['Sroster_k0jb'] = 'Staff_ctrl/schedule';
$route['Stokenreq_m4tz'] = 'Staff_ctrl/leave_request';
$route['Sopen_z3bt'] = 'Staff_ctrl/profile';
$route['Slip_j4qg'] = 'Staff_ctrl/payslip';

