<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->addRedirect('/table/array', '/react/tabela/array');
$routes->addRedirect('/table/api', '/react/tabela/api');

# www/react/(:any)
$routes->group('react', function ($routes) {
    # www/react/tabela/(:any)
    $routes->group('tabela', function ($routes) {
        # www/react/tabela/api/(:any)
        $routes->get('api', 'ModeloReactEndPointController::apiTable');
        $routes->get('api/(:segment)', 'ModeloReactEndPointController::apiTable/$1');
        $routes->get('api/(:any)', 'ModeloReactEndPointController::apiTable/$1');
        $routes->post('api', 'ModeloReactEndPointController::apiTable');
        $routes->post('api/(:segment)', 'ModeloReactEndPointController::apiTable/$1');
        # www/react/tabela/array/(:any)
        $routes->get('array', 'ModeloReactEndPointController::arrayTable');
        $routes->get('array/(:segment)', 'ModeloReactEndPointController::arrayTable/$1');
        $routes->get('array/(:any)', 'ModeloReactEndPointController::arrayTable/$1');
        $routes->post('array', 'ModeloReactEndPointController::arrayTable');
        $routes->post('array/(:segment)', 'ModeloReactEndPointController::arrayTable/$1');
    });
});

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
