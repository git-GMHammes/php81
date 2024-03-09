<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->addRedirect('/table/array', '/react/tabela/array');
$routes->addRedirect('/table/api', '/react/tabela/api');

# www/meureact/(:any)
$routes->group('meureact', function ($routes) {
    # www/meureact/endpoint/verbo/(:any)
    $routes->group('api', function ($routes) {
        # www/meureact/api/verbo/(:any)
        $routes->get('verbo', 'Controller::verbo');
        $routes->get('verbo/(:segment)', 'Controller::verbo/$1');
        $routes->get('verbo/(:any)', 'Controller::verbo/$1');
        $routes->post('verbo', 'Controller::verbo');
        $routes->group('endpoint', function ($routes) {
        });
    });
    # www/meureact/endpoint/myCard/(:any)
    $routes->group('endpoint', function ($routes) {
        # www/meureact/endpoint/cartao/(:any)
        $routes->get('cartao', 'MeuReactEndpointController::myCard');
        $routes->get('cartao/(:segment)', 'MeuReactEndpointController::myCard/$1');
        $routes->get('cartao/(:any)', 'MeuReactEndpointController::myCard/$1');
        $routes->post('cartao', 'MeuReactEndpointController::myCard');
    });
});

# www/dadospessoais/(:any)
$routes->group('candidato', function ($routes) {
    # www/candidato/api/(:any)
    $routes->group('api', function ($routes) {
        # www/candidato/api/criar/(:any)
        $routes->get('criar', 'CandidatoApiController::create_update');
        $routes->get('criar/(:segment)', 'CandidatoApiController::create_update/$1');
        $routes->get('criar/(:any)', 'CandidatoApiController::create_update/$1');
        $routes->post('criar', 'CandidatoApiController::create_update');
        # www/candidato/api/listar/(:any)
        $routes->get('listar', 'CandidatoApiController::dbRead');
        $routes->get('listar/(:segment)', 'CandidatoApiController::dbRead/$1');
        $routes->get('listar/(:any)', 'CandidatoApiController::dbRead/$1');
        $routes->post('listar', 'CandidatoApiController::dbRead');
        # www/candidato/api/atualizar/(:any)
        $routes->get('atualizar', 'CandidatoApiController::create_update');
        $routes->get('atualizar/(:segment)', 'CandidatoApiController::create_update/$1');
        $routes->get('atualizar/(:any)', 'CandidatoApiController::create_update/$1');
        $routes->post('atualizar', 'CandidatoApiController::create_update');
        # www/candidato/api/excluir/(:any)
        $routes->get('excluir', 'CandidatoApiController::dbDelete');
        $routes->get('excluir/(:segment)', 'CandidatoApiController::dbDelete/$1');
        $routes->get('excluir/(:any)', 'CandidatoApiController::dbDelete/$1');
        $routes->post('excluir', 'CandidatoApiController::dbDelete');
        # www/candidato/api/limpar/(:any)
        $routes->get('limpar', 'CandidatoApiController::dbClean');
        $routes->get('limpar/(:segment)', 'CandidatoApiController::dbClean/$1');
        $routes->get('limpar/(:any)', 'CandidatoApiController::dbClean/$1');
        $routes->post('limpar', 'CandidatoApiController::dbClean');
    });
    # www/candidato/endpoint/(:any)
    $routes->group('endpoint', function ($routes) {
        # www/candidato/endpoint/criar/(:any)
        $routes->get('criar', 'CandidatoEndPointController::dbCreate');
        $routes->get('criar/(:segment)', 'CandidatoEndPointController::dbCreate/$1');
        $routes->get('criar/(:any)', 'CandidatoEndPointController::dbCreate/$1');
        $routes->post('criar', 'CandidatoEndPointController::dbCreate');
        # www/candidato/endpoint/listar/(:any)
        $routes->get('listar', 'CandidatoEndPointController::dbRead');
        $routes->get('listar/(:segment)', 'CandidatoEndPointController::dbRead/$1');
        $routes->get('listar/(:any)', 'CandidatoEndPointController::dbRead/$1');
        $routes->post('listar', 'CandidatoEndPointController::dbRead');
        # www/candidato/endpoint/atualizar/(:any)
        $routes->get('atualizar', 'CandidatoEndPointController::dbUpdate');
        $routes->get('atualizar/(:segment)', 'CandidatoEndPointController::dbUpdate/$1');
        $routes->get('atualizar/(:any)', 'CandidatoEndPointController::dbUpdate/$1');
        $routes->post('atualizar', 'CandidatoEndPointController::dbUpdate');
        # www/candidato/endpoint/excluir/(:any)
        $routes->get('excluir', 'CandidatoEndPointController::dbDelete');
        $routes->get('excluir/(:segment)', 'CandidatoEndPointController::dbDelete/$1');
        $routes->get('excluir/(:any)', 'CandidatoEndPointController::dbDelete/$1');
        $routes->post('excluir', 'CandidatoEndPointController::dbDelete');
        # www/candidato/endpoint/limpar/(:any)
        $routes->get('limpar', 'CandidatoEndPointController::dbClean');
        $routes->get('limpar/(:segment)', 'CandidatoEndPointController::dbClean/$1');
        $routes->get('limpar/(:any)', 'CandidatoEndPointController::dbClean/$1');
        $routes->post('limpar', 'CandidatoEndPointController::dbClean');
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
    # www/calendar/usuario/(:any)
    $routes->group('usuario', function ($routes) {
        # www/calendar/usuario/api/(:any)
        $routes->group('api', function ($routes) {
            # www/calendar/usuario/api/criar/(:any)
            $routes->get('criar', 'UserApiController::create_update');
            $routes->get('criar/(:segment)', 'UserApiController::create_update/$1');
            $routes->get('criar/(:any)', 'UserApiController::create_update/$1');
            $routes->post('criar', 'UserApiController::create_update');
            $routes->post('criar/(:any)', 'UserApiController::create_update/$1');
        });
        $routes->group('endpoint', function ($routes) {
        });
    });
    $routes->group('api', function ($routes) {
        # www/calendar/api/criar/(:any)
        $routes->get('criar', 'CalendarApiController::create_update');
        $routes->get('criar/(:segment)', 'CalendarApiController::create_update/$1');
        $routes->get('criar/(:any)', 'CalendarApiController::create_update/$1');
        $routes->post('criar', 'CalendarApiController::create_update');
        # www/calendar/api/listar/(:any)
        $routes->get('listar', 'CalendarApiController::dbRead');
        $routes->get('listar/(:segment)', 'CalendarApiController::dbRead/$1');
        $routes->get('listar/(:any)', 'CalendarApiController::dbRead/$1');
        $routes->post('listar', 'CalendarApiController::dbRead');
        # www/calendar/api/atualizar/(:any)
        $routes->get('atualizar', 'CalendarApiController::create_update');
        $routes->get('atualizar/(:segment)', 'CalendarApiController::create_update/$1');
        $routes->get('atualizar/(:any)', 'CalendarApiController::create_update/$1');
        $routes->post('atualizar', 'CalendarApiController::create_update');
        # www/calendar/api/excluir/(:any)
        $routes->get('excluir', 'CalendarApiController::dbDelete');
        $routes->get('excluir/(:segment)', 'CalendarApiController::dbDelete/$1');
        $routes->get('excluir/(:any)', 'CalendarApiController::dbDelete/$1');
        $routes->post('excluir', 'CalendarApiController::dbDelete');
        # www/calendar/api/limpar/(:any)
        $routes->get('limpar', 'CalendarApiController::dbClean');
        $routes->get('limpar/(:segment)', 'CalendarApiController::dbClean/$1');
        $routes->get('limpar/(:any)', 'CalendarApiController::dbClean/$1');
        $routes->post('limpar', 'CalendarApiController::dbClean');
    });
    # www/calendar/endpoint/(:any)
    $routes->group('endpoint', function ($routes) {
        # www/calendar/endpoint/principal/(:any)
        $routes->get('principal', 'CalendarEndPointController::main');
        $routes->get('principal/(:segment)', 'CalendarEndPointController::main/$1');
        $routes->get('principal/(:any)', 'CalendarEndPointController::main/$1');
        $routes->post('principal', 'CalendarEndPointController::main');
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
