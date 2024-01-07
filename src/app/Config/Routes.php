<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

# www/upload/(:any)
$routes->group('upload', function ($routes) {
    # www/upload/api/(:any)
    $routes->group('api', function ($routes) {
        # www/upload/api/form_upload/(:any)
        $routes->get('form_upload', 'MyUploadApi::formUpload');
        $routes->get('form_upload/(:segment)', 'MyUploadApi::formUpload/$1');
        $routes->get('form_upload/(:any)', 'MyUploadApi::formUpload/$1');
        $routes->post('form_upload', 'MyUploadApi::formUpload');
    });
    # www/upload/endpoint/(:any)
    $routes->group('endpoint', function ($routes) {
        # www/upload/endpoint/form_upload/(:any)
        $routes->get('form_upload', 'MyUploadEndpoint::formUpload');
        $routes->get('form_upload/(:segment)', 'MyUploadEndpoint::formUpload/$1');
        $routes->get('form_upload/(:any)', 'MyUploadEndpoint::formUpload/$1');
        $routes->post('form_upload', 'MyUploadEndpoint::formUpload');
    });
});