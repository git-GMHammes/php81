<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->addRedirect('/table/array', '/react/tabela/array');
$routes->addRedirect('/table/api', '/react/tabela/api');

# www/orgaoseguranca/(:any)
$routes->group('orgaoseguranca', function ($routes) {
    # www/orgaoseguranca/api/(:any)
    $routes->group('api', function ($routes) {
        # www/orgaoseguranca/api/exibir/(:any)
        $routes->get('exibir', 'OrgaoSegurancaApiController::dbRead');
        $routes->get('exibir/(:segment)', 'OrgaoSegurancaApiController::dbRead/$1');
        $routes->get('exibir/(:any)', 'OrgaoSegurancaApiController::dbRead/$1');
        $routes->post('exibir', 'OrgaoSegurancaApiController::dbRead');
        $routes->post('exibir/(:any)', 'OrgaoSegurancaApiController::dbRead/$1');
    });
    # www/orgaoseguranca/endpoint/(:any)
    $routes->group('endpoint', function ($routes) {
        # www/orgaoseguranca/endpoint/verbo/(:any)
        $routes->get('verbo', 'Controller::dbVerbo');
        $routes->get('verbo/(:segment)', 'Controller::dbVerbo/$1');
        $routes->get('verbo/(:any)', 'Controller::dbVerbo/$1');
        $routes->post('verbo', 'Controller::dbVerbo');
        $routes->post('verbo/(:any)', 'Controller::dbVerbo/$1');
    });
});

# www/acesso/(:any)
$routes->group('acesso', function ($routes) {
    # www/acesso/usuario/(:any)
    $routes->group('usuario', function ($routes) {
        # www/acesso/usuario/api/(:any)
        // src\app\Controllers\UsuarioAcessoEndPintController.php
        $routes->group('api', function ($routes) {
            # www/acesso/usuario/api/login/(:any)
            $routes->get('login', 'UsuarioAcessoApiController::auth');
            $routes->get('login/(:segment)', 'UsuarioAcessoApiController::auth/$1');
            $routes->get('login/(:any)', 'UsuarioAcessoApiController::auth/$1');
            $routes->post('login', 'UsuarioAcessoApiController::auth');
            $routes->post('login/(:any)', 'UsuarioAcessoApiController::auth/$1');
        });
        $routes->group('endpoint', function ($routes) {
            # www/acesso/usuario/endpoint/login/(:any)
            $routes->get('login', 'UsuarioAcessoEndPintController::auth');
            $routes->get('login/(:segment)', 'UsuarioAcessoEndPintController::auth/$1');
            $routes->get('login/(:any)', 'UsuarioAcessoEndPintController::auth/$1');
            $routes->post('login', 'UsuarioAcessoEndPintController::auth');
            $routes->post('login/(:any)', 'UsuarioAcessoEndPintController::auth/$1');
        });
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

# www/tipopessoa/(:any)
$routes->group('tipopessoa', function ($routes) {
    # www/tipopessoa/endpoint/verbo/(:any)
    $routes->group('api', function ($routes) {
        # www/tipopessoa/api/exibir/(:any)
        $routes->get('exibir', 'TipoPessoaApiController::dbRead');
        $routes->get('exibir/(:segment)', 'TipoPessoaApiController::dbRead/$1');
        $routes->get('exibir/(:any)', 'TipoPessoaApiController::dbRead/$1');
        $routes->post('exibir', 'TipoPessoaApiController::dbRead');
        $routes->post('exibir/(:any)', 'TipoPessoaApiController::dbRead/$1');
    });
});

# www/generopessoa/(:any)
$routes->group('generopessoa', function ($routes) {
    # www/generopessoa/endpoint/verbo/(:any)
    $routes->group('api', function ($routes) {
        # www/generopessoa/api/exibir/(:any)
        $routes->get('exibir', 'GeneroPessoaApiController::dbRead');
        $routes->get('exibir/(:segment)', 'GeneroPessoaApiController::dbRead/$1');
        $routes->get('exibir/(:any)', 'GeneroPessoaApiController::dbRead/$1');
        $routes->post('exibir', 'GeneroPessoaApiController::dbRead');
        $routes->post('exibir/(:any)', 'GeneroPessoaApiController::dbRead/$1');
    });
});

# www/meureact/(:any)
$routes->group('meureact', function ($routes) {
    # www/meureact/endpoint/verbo/(:any)
    $routes->group('api', function ($routes) {
        # www/meureact/api/ordenar/(:any)
        $routes->get('ordenar', 'MeuReactApiController::dbSort');
        $routes->get('ordenar/(:segment)', 'MeuReactApiController::dbSort/$1');
        $routes->get('ordenar/(:any)', 'MeuReactApiController::dbSort/$1');
        $routes->post('ordenar', 'MeuReactApiController::dbSort');
    });
    # www/meureact/endpoint/myCard/(:any)
    $routes->group('endpoint', function ($routes) {
        # www/meureact/endpoint/cartao/(:any)
        $routes->get('cartao', 'MeuReactEndpointController::myCard');
        $routes->get('cartao/(:segment)', 'MeuReactEndpointController::myCard/$1');
        $routes->get('cartao/(:any)', 'MeuReactEndpointController::myCard/$1');
        $routes->post('cartao', 'MeuReactEndpointController::myCard');
        # www/meureact/endpoint/arrasta/(:any)
        $routes->get('arrasta', 'MeuReactEndpointController::myDrag');
        $routes->get('arrasta/(:segment)', 'MeuReactEndpointController::myDrag/$1');
        $routes->get('arrasta/(:any)', 'MeuReactEndpointController::myDrag/$1');
        $routes->post('arrasta', 'MeuReactEndpointController::myDrag');
        # www/meureact/endpoint/ordenar/(:any)
        $routes->get('ordenar', 'MeuReactEndpointController::myorder');
        $routes->get('ordenar/(:segment)', 'MeuReactEndpointController::myorder/$1');
        $routes->get('ordenar/(:any)', 'MeuReactEndpointController::myorder/$1');
        $routes->post('ordenar', 'MeuReactEndpointController::myorder');
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
        # www/dadospessoais/api/exibir/(:any)
        $routes->get('exibir', 'DadosPessoaisApiController::dbRead');
        $routes->get('exibir/(:segment)', 'DadosPessoaisApiController::dbRead/$1');
        $routes->get('exibir/(:any)', 'DadosPessoaisApiController::dbRead/$1');
        $routes->post('exibir', 'DadosPessoaisApiController::dbRead');
        # www/dadospessoais/api/atualizar/(:any)
        $routes->get('atualizar', 'DadosPessoaisApiController::create_update');
        $routes->get('atualizar/(:segment)', 'DadosPessoaisApiController::create_update/$1');
        $routes->get('atualizar/(:any)', 'DadosPessoaisApiController::create_update/$1');
        $routes->post('atualizar', 'DadosPessoaisApiController::create_update');
        # www/dadospessoais/api/deletar/(:any)
        $routes->get('deletar', 'DadosPessoaisApiController::dbDelete');
        $routes->get('deletar/(:segment)', 'DadosPessoaisApiController::dbDelete/$1');
        $routes->get('deletar/(:any)', 'DadosPessoaisApiController::dbDelete/$1');
        $routes->post('deletar', 'DadosPessoaisApiController::dbDelete');
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
