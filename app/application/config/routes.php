<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'front/index';
$route['404_override'] = 'front/page_404';
$route['404'] = 'front/page_404';
$route['maintenance'] = 'front/maintenance';
$route['translate_uri_dashes'] = FALSE;
$route['image'] = 'admin/storage/image';

//ADMIn routes
$route['admin'] = 'admin/home/index';
$route['admin/storage/upload'] = 'admin/storage/upload';
$route['admin/storage/(:any)'] = 'admin/storage';
$route['admin/storage'] = 'admin/storage/cmd';
$route['admin/files'] = 'admin/storage/manager';

//-----------------items-------------------

$route['admin/items'] = 'admin/items/index';
$route['admin/items/create'] = 'admin/items/create';
$route['admin/items/edit/(:num)'] = 'admin/items/edit';
$route['admin/items/delete/(:num)'] = 'admin/items/delete';

$route['admin/items/vers/(:num)'] = 'admin/items/version_index';
$route['admin/items/vers/edit'] = 'admin/items/version_edit';
$route['admin/items/vers/edit/(:num)'] = 'admin/items/version_edit';
$route['admin/items/vers/(:num)/delete/(:num)'] = 'admin/items/version_delete';

$route['admin/tags'] = 'admin/items/cate_index';
$route['admin/tags/edit'] = 'admin/items/cate_edit';
$route['admin/tags/edit/(:num)'] = 'admin/items/cate_edit';
$route['admin/tags/delete/(:num)'] = 'admin/items/cate_delete';

$route['admin/license'] = 'admin/items/license_index';
$route['admin/license/generate'] = 'admin/items/license_generate';
$route['admin/license/delete/(:num)'] = 'admin/items/license_delete';

//----------------webmaster-------------------
$route['admin/webmaster'] = 'admin/webmaster/index';

//----------------Websettings------------------
$route['admin/websettings'] = 'admin/websettings/index';

//-----------------Users Manager-----------------
$route['admin/users'] = 'admin/users/index';
$route['admin/users/create'] = 'admin/users/create';
$route['admin/users/edit/(:num)'] = 'admin/users/users_edit';
$route['admin/users/delete/(:num)'] = 'admin/users/users_delete';

$route['admin/users/(:num)/owned'] = 'admin/users/owned_list';
$route['admin/users/(:num)/owned/delete/(:num)'] = 'admin/users/owned_delete';

$route['admin/users/(:num)/badge'] = 'admin/users/badge_list';
$route['admin/users/(:num)/badge/delete/(:num)'] = 'admin/users/badge_delete';
//------------------Site Page--------------------

$route['admin/icons'] = 'admin/home/icons';

$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';
$route['auth/logout'] = 'auth/logout';
$route['verify'] = 'auth/verify';
$route['verify/(:any)'] = 'auth/token';
$route['forgot'] = 'auth/forgot';
$route['forgot/(:any)'] = 'auth/token';
$route['banned'] = 'auth/banned';

$route['users'] = 'users/index';
$route['users/settings'] = 'users/settings';
$route['users/(:any)'] = 'users/get_users';
$route['users/ajax/changepassword'] = 'users/change_password';
$route['users/ajax/changeusername'] = 'users/change_username';
$route['users/ajax/changeemail'] = 'users/change_email';
$route['users/ajax/changeavatar'] = 'users/change_avatar';
$route['users/ajax/uploadavatar'] = 'users/upload_avatar';

$route['home'] = 'front/index';
$route['explore'] = 'front/explore';
$route['item/(:any)'] = 'front/detail_items';

$route['payment/(:num)'] = 'pay/index';
$route['licence'] = 'pay/claim_licence';
$route['licence/(:any)'] = 'pay/claim_licence';
$route['c/(:any)'] = 'pay/md_licence';

$route['client'] = 'users/index';
$route['customer'] = 'users/index';
$route['member'] = 'users/index';

$route['library'] = 'front/owned';
$route['download/(:num)'] = 'front/download_items';

$route['notify'] = 'pay/notification';
$route['invoice'] = 'pay/invoice';
$route['invoice/(:num)'] = 'pay/invoice';

$route['api'] = 'api/index';
$route['api/(:num)'] = 'api/detail';
$route['api/getitem'] = 'api/list_item';
$route['api/generate-licence'] = 'api/generate_licence';
