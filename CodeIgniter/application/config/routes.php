<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "pages/view";
$route['auth'] = "auth";
$route['auth/login'] = "auth/login";
$route['auth/logout'] = "auth/logout";
$route['auth/create_user'] = "auth/create_user";
$route['booking/create_booking'] = "booking_controller/create_booking";
$route['booking/hotel_list'] = "booking_controller/hotel_list";
$route['hotels/create'] = "hotels_controller/create_hotel";
$route['hotels/list'] = "hotels_controller/list_hotel";
$route['hotels/update/(:any)'] = 'hotels_controller/update_hotel/$1';
$route['features/list'] = "feature_controller/list_features";
$route['features/create'] = "feature_controller/create_feature";
$route['migrate'] = "migrate";
$route['test'] = "test/view";
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
