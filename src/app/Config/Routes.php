<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->addRedirect('/table/array', '/react/tabela/array');
$routes->addRedirect('/table/api', '/react/tabela/api');

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
        # www/dadospessoais/endpoint/listar/array/(:any)
        $routes->get('listar/array', 'DadosPessoaisEndPointController::dbRead_array');
        $routes->get('listar/array/(:segment)', 'DadosPessoaisEndPointController::dbRead_array/$1');
        $routes->get('listar/array/(:any)', 'DadosPessoaisEndPointController::dbRead_array/$1');
        $routes->post('listar/array', 'DadosPessoaisEndPointController::dbRead_array');
        # www/dadospessoais/endpoint/listar/api/(:any)
        $routes->get('listar/api', 'DadosPessoaisEndPointController::dbRead_api');
        $routes->get('listar/api/(:segment)', 'DadosPessoaisEndPointController::dbRead_api/$1');
        $routes->get('listar/api/(:any)', 'DadosPessoaisEndPointController::dbRead_api/$1');
        $routes->post('listar/api', 'DadosPessoaisEndPointController::dbRead_api');
        # www/dadospessoais/endpoint/create/dadospessoais/(:any)
        $routes->get('create/dadospessoais', 'DadosPessoaisEndPointController::dbCreate');
        $routes->get('create/dadospessoais/(:segment)', 'DadosPessoaisEndPointController::dbCreate/$1');
        $routes->get('create/dadospessoais/(:any)', 'DadosPessoaisEndPointController::dbCreate/$1');
        $routes->post('create/dadospessoais', 'DadosPessoaisEndPointController::dbCreate');
    });
});

# www/calendar/(:any)
$routes->group('calendar', function ($routes) {
    # www/calendar/api/(:any)
    $routes->group('api', function ($routes) {
        # www/calendar/api/criar/(:any)
        $routes->get('criar', 'ApiController::create_update');
        $routes->get('criar/(:segment)', 'ApiController::create_update/$1');
        $routes->get('criar/(:any)', 'ApiController::create_update/$1');
        $routes->post('criar', 'ApiController::create_update');
        # www/calendar/api/listar/(:any)
        $routes->get('listar', 'ApiController::dbRead');
        $routes->get('listar/(:segment)', 'ApiController::dbRead/$1');
        $routes->get('listar/(:any)', 'ApiController::dbRead/$1');
        $routes->post('listar', 'ApiController::dbRead');
        # www/calendar/api/atualizar/(:any)
        $routes->get('atualizar', 'ApiController::create_update');
        $routes->get('atualizar/(:segment)', 'ApiController::create_update/$1');
        $routes->get('atualizar/(:any)', 'ApiController::create_update/$1');
        $routes->post('atualizar', 'ApiController::create_update');
        # www/calendar/api/excluir/(:any)
        $routes->get('excluir', 'ApiController::dbDelete');
        $routes->get('excluir/(:segment)', 'ApiController::dbDelete/$1');
        $routes->get('excluir/(:any)', 'ApiController::dbDelete/$1');
        $routes->post('excluir', 'ApiController::dbDelete');
        # www/calendar/api/limpar/(:any)
        $routes->get('limpar', 'ApiController::dbClean');
        $routes->get('limpar/(:segment)', 'ApiController::dbClean/$1');
        $routes->get('limpar/(:any)', 'ApiController::dbClean/$1');
        $routes->post('limpar', 'ApiController::dbClean');
    });
    # www/calendar/endpoint/(:any)
    $routes->group('endpoint', function ($routes) {
        # www/calendar/endpoint/listar/(:any)
        $routes->get('listar', 'CalendarEndPointController::dbRead');
        $routes->get('listar/(:segment)', 'CalendarEndPointController::dbRead/$1');
        $routes->get('listar/(:any)', 'CalendarEndPointController::dbRead/$1');
        $routes->post('listar', 'CalendarEndPointController::dbRead');
        # www/calendar/endpoint/create/calendar/(:any)
        $routes->get('create/calendar', 'CalendarEndPointController::dbCreate');
        $routes->get('create/calendar/(:segment)', 'CalendarEndPointController::dbCreate/$1');
        $routes->get('create/calendar/(:any)', 'CalendarEndPointController::dbCreate/$1');
        $routes->post('create/calendar', 'CalendarEndPointController::dbCreate');
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

