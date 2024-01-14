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

# www/dadospessoais/(:any)
$routes->group('dadospessoais', function ($routes) {
    # www/dadospessoais/api/(:any)
    $routes->group('api', function ($routes) {
        # www/dadospessoais/api/criar/(:any)
        $routes->get('criar', 'DadosPessoaisApiController::create_update');
        $routes->get('criar/(:segment)', 'DadosPessoaisApiController::create_update/$1');
        $routes->get('criar/(:any)', 'DadosPessoaisApiController::create_update/$1');
        $routes->post('criar', 'DadosPessoaisApiController::create_update');
        # www/dadospessoais/api/listar/(:any)
        $routes->get('listar', 'DadosPessoaisApiController::dbRead');
        $routes->get('listar/(:segment)', 'DadosPessoaisApiController::dbRead/$1');
        $routes->get('listar/(:any)', 'DadosPessoaisApiController::dbRead/$1');
        $routes->post('listar', 'DadosPessoaisApiController::dbRead');
        # www/dadospessoais/api/atualizar/(:any)
        $routes->get('atualizar', 'DadosPessoaisApiController::create_update');
        $routes->get('atualizar/(:segment)', 'DadosPessoaisApiController::create_update/$1');
        $routes->get('atualizar/(:any)', 'DadosPessoaisApiController::create_update/$1');
        $routes->post('atualizar', 'DadosPessoaisApiController::create_update');
        # www/dadospessoais/api/excluir/(:any)
        $routes->get('excluir', 'DadosPessoaisApiController::dbDelete');
        $routes->get('excluir/(:segment)', 'DadosPessoaisApiController::dbDelete/$1');
        $routes->get('excluir/(:any)', 'DadosPessoaisApiController::dbDelete/$1');
        $routes->post('excluir', 'DadosPessoaisApiController::dbDelete');
        # www/dadospessoais/api/limpar/(:any)
        $routes->get('limpar', 'DadosPessoaisApiController::dbClean');
        $routes->get('limpar/(:segment)', 'DadosPessoaisApiController::dbClean/$1');
        $routes->get('limpar/(:any)', 'DadosPessoaisApiController::dbClean/$1');
        $routes->post('limpar', 'DadosPessoaisApiController::dbClean');
    });
    # www/dadospessoais/endpoint/(:any)
    $routes->group('endpoint', function ($routes) {
        # www/dadospessoais/endpoint/listar/(:any)
        $routes->get('listar', 'DadosPessoaisEndPointController::dbRead');
        $routes->get('listar/(:segment)', 'DadosPessoaisEndPointController::dbRead/$1');
        $routes->get('listar/(:any)', 'DadosPessoaisEndPointController::dbRead/$1');
        $routes->post('listar', 'DadosPessoaisEndPointController::dbRead');
    });
});
