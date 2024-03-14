<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
// use App\Models\NomeModel;
use Exception;

class MeuReactEndpointController extends ResourceController
{
    use ResponseTrait;
    private $template = 'react_web/template/main';
    private $message = 'react_web/message';
    private $footer = 'react_web/footer';
    private $head = 'react_web/head';
    private $menu = 'react_web/menu';
    private $ModelResponse;
    private $uri;
    private $token;
    #
    public function __construct()
    {
        // $this->ModelResponse = new NomeModel();
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
        // $this->token = isset($_COOKIE['token']) ? $_COOKIE['token'] : '123';
    }
    #
    # route POST /www/sigla/rota
    # route GET /www/sigla/rota
    # Informação sobre o controller
    # retorno do controller [view]
    public function index($parameter = NULL)
    {
        $request = service('request');
        $processRequest = (array) $request->getVar();
        // $processRequest = eagarScagaire($processRequest);
        $json = $processRequest['json'] ?? 0;
        #
        $loadView = array(
            $this->head,
            $this->menu,
            $this->message,
            $this->footer,
        );
        try {
            # URI da API                                                                                                          
            $endPoint['objeto'] = myEndPoint('index.php/projeto/endereco/api/verbo', '123');
            $requestJSONform['objeto'] = $endPoint['objeto']['result'] ?? array();
            # Configuração Paginate
            if (isset($requestJSONform['objeto'])) {
                $totalItems = count($requestJSONform['objeto']);
                $itemsPerPage = 10; // Itens por página
                // $totalPages = ceil($totalItems / $itemsPerPage);
                $currentPage = $request->getVar('page') ?? 1;
                # Constrção Paginate
                $pager = service('pager');
                $pager->setPath('intranet/painel/endpoint/master');
                $pager->makeLinks($currentPage, $itemsPerPage, $totalItems);
                # Finalização Paginate
                $requestJSONform['objeto']['list'] = $this->paginateArray($requestJSONform['objeto'], $currentPage, $itemsPerPage);
                $requestJSONform['objeto']['pager'] = $pager;
            }
            #
            $requestJSONform = array();
            $apiRespond = [
                'status' => 'success',
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => $request->getMethod() ?? 'unknown',
                    'description' => 'API Description',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'result' => $processRequest,
                'loadView' => $loadView,
                'metadata' => [
                    'page_title' => 'Application title',
                    'getURI' => $this->uri->getSegments(),
                    // Você pode adicionar campos comentados anteriormente se forem relevantes
                    // 'method' => '__METHOD__',
                    // 'function' => '__FUNCTION__',
                ]
            ];
        } catch (\Exception $e) {
            $apiRespond = [
                'status' => 'error',
                'message' => $e->getMessage(),
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => $request->getMethod() ?? 'unknown',
                    'description' => 'API Criar Method',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                'metadata' => [
                    'page_title' => 'ERRO - API Method',
                    'getURI' => $this->uri->getSegments(),
                ]
            ];
        }
        if ($json != 1) {
            return $apiRespond;
        } else {
            return view($this->template, $apiRespond);
            // return $apiRespond;
        }
    }

    private function returnMyFunction($message = array(), $typeMessage, $dataValue = array())
    {
        // ['success', 'warning', 'danger'];
        if ($message !== array()) {
            $message['message'][$typeMessage] = $message;
            session()->set('message', $message);
            session()->markAsTempdata('message', 5);
            if ($dataValue !== array()) {
                session()->set('value_form', $dataValue);
            }
            session()->markAsTempdata('message', 15);
        }
        return(NULL);
    }

    private function paginateArray($data, $page, $perPage)
    {
        // Calcula o offset
        $offset = ($page - 1) * $perPage;

        // Retorna os itens da página atual
        return array_slice($data, $offset, $perPage);
    }

    private function token_csrf()
    {
        $token_csrf = md5(password_hash(time(), PASSWORD_DEFAULT));
        session()->set('token_csrf', $token_csrf);
        session()->markAsTempdata('token_csrf', 1800);
        // myPrint($token_csrf, 'www\oficina\app\Controllers\CustomersEndPointController.php', true);
        return $token_csrf;
    }

    # Consumo de API
    # route GET /meureact/endpoint/cartao/(:any)
    # route POST /meureact/endpoint/cartao/(:any)
    # Informação sobre o controller
    # retorno do controller [VIEW]
    public function myCard($parameter = NULL)
    {
        $request = service('request');
        $processRequest = (array) $request->getVar();
        $json = $processRequest['json'] ?? 0;
        $id = (isset($processRequest['id'])) ? ('/' . $processRequest['id']) : ('/' . $parameter);
        // $processRequest = eagarScagaire($processRequest);
        #
        $loadView = array(
            $this->head,
            $this->menu,
            'react_web/simples_001',
            $this->message,
            $this->footer,
        );
        try {
            # URI da API                                                                                                          
            $endPoint['objeto'] = myEndPoint('index.php/projeto/endereco/api/verbo', '123');
            $requestJSONform['objeto'] = $endPoint['objeto']['result'] ?? array();
            # Configuração Paginate
            $totalItems = count($requestJSONform['objeto']);
            $itemsPerPage = 10; // Itens por página
            // $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = $request->getVar('page') ?? 1;
            # Constrção Paginate
            $pager = service('pager');
            $pager->setPath('intranet/painel/endpoint/master');
            $pager->makeLinks($currentPage, $itemsPerPage, $totalItems);
            # Finalização Paginate
            $requestJSONform['objeto']['list'] = $this->paginateArray($requestJSONform['objeto'], $currentPage, $itemsPerPage);
            $requestJSONform['objeto']['pager'] = $pager;
            #
            $requestJSONform = array();
            $apiRespond = [
                'status' => 'success',
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => $request->getMethod() ?? 'unknown',
                    'description' => 'API Description',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'result' => $processRequest,
                'loadView' => $loadView,
                'metadata' => [
                    'page_title' => 'Application title',
                    'getURI' => $this->uri->getSegments(),
                    // Você pode adicionar campos comentados anteriormente se forem relevantes
                    // 'method' => '__METHOD__',
                    // 'function' => '__FUNCTION__',
                ]
            ];
            if ($json == 1) {
                $response = $this->response->setJSON($apiRespond, 201);
            }
        } catch (\Exception $e) {
            $apiRespond = [
                'status' => 'error',
                'message' => $e->getMessage(),
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => $request->getMethod() ?? 'unknown',
                    'description' => 'API Criar Method',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                'metadata' => [
                    'page_title' => 'ERRO - API Method',
                    'getURI' => $this->uri->getSegments(),
                ]
            ];
            if ($json == 1) {
                $response = $this->response->setJSON($apiRespond, 500);
            }
        }
        if ($json == 1) {
            return $apiRespond;
        } else {
            return view($this->template, $apiRespond);
            // return $apiRespond;
        }
    }

    # Consumo de API
    # route GET /www/meureact/endpoint/arrasta/(:any)
    # route POST /www/meureact/endpoint/arrasta/(:any)
    # Informação sobre o controller
    # retorno do controller [VIEW]
    public function myDrag($parameter = NULL)
    {
        $request = service('request');
        $processRequest = (array) $request->getVar();
        $json = $processRequest['json'] ?? 0;
        $id = (isset($processRequest['id'])) ? ('/' . $processRequest['id']) : ('/' . $parameter);
        // $processRequest = eagarScagaire($processRequest);
        #
        $loadView = array(
            $this->head,
            $this->menu,
            'react_web/arrasta',
            $this->message,
            $this->footer,
        );
        try {
            # URI da API                                                                                                          
            $endPoint['objeto'] = myEndPoint('index.php/projeto/endereco/api/verbo', '123');
            $requestJSONform['objeto'] = $endPoint['objeto']['result'] ?? array();
            # Configuração Paginate
            $totalItems = count($requestJSONform['objeto']);
            $itemsPerPage = 10; // Itens por página
            // $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = $request->getVar('page') ?? 1;
            # Constrção Paginate
            $pager = service('pager');
            $pager->setPath('intranet/painel/endpoint/master');
            $pager->makeLinks($currentPage, $itemsPerPage, $totalItems);
            # Finalização Paginate
            $requestJSONform['objeto']['list'] = $this->paginateArray($requestJSONform['objeto'], $currentPage, $itemsPerPage);
            $requestJSONform['objeto']['pager'] = $pager;
            #
            $requestJSONform = array();
            $apiRespond = [
                'status' => 'success',
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => $request->getMethod() ?? 'unknown',
                    'description' => 'API Description',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'result' => $processRequest,
                'loadView' => $loadView,
                'metadata' => [
                    'page_title' => 'Application title',
                    'getURI' => $this->uri->getSegments(),
                    // Você pode adicionar campos comentados anteriormente se forem relevantes
                    // 'method' => '__METHOD__',
                    // 'function' => '__FUNCTION__',
                ]
            ];
            if ($json == 1) {
                $response = $this->response->setJSON($apiRespond, 201);
            }
        } catch (\Exception $e) {
            $apiRespond = [
                'status' => 'error',
                'message' => $e->getMessage(),
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => $request->getMethod() ?? 'unknown',
                    'description' => 'API Criar Method',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                'metadata' => [
                    'page_title' => 'ERRO - API Method',
                    'getURI' => $this->uri->getSegments(),
                ]
            ];
            if ($json == 1) {
                $response = $this->response->setJSON($apiRespond, 500);
            }
        }
        if ($json == 1) {
            return $apiRespond;
        } else {
            return view($this->template, $apiRespond);
            // return $apiRespond;
        }
    }

    # Consumo de API
    # route GET /www/meureact/endpoint/ordenar/(:any)
    # route POST /www/meureact/endpoint/ordenar/(:any)
    # Informação sobre o controller
    # retorno do controller [VIEW]
    public function myorder($parameter = NULL)
    {
        $request = service('request');
        $processRequest = (array) $request->getVar();
        $json = $processRequest['json'] ?? 0;
        $id = (isset($processRequest['id'])) ? ('/' . $processRequest['id']) : ('/' . $parameter);
        // $processRequest = eagarScagaire($processRequest);
        #
        $loadView = array(
            $this->head,
            $this->menu,
            'react_web/tabela_api_order_submit',
            'react_web/tabela_api_order',
            'react_web/tabela_api',
            'react_web/tabela_indice',
            'react_web/tabela',
            $this->message,
            $this->footer,
        );
        try {
            # URI da API                                                                                                          
            $endPoint['objeto'] = myEndPoint('index.php/projeto/endereco/api/verbo', '123');
            $requestJSONform['objeto'] = $endPoint['objeto']['result'] ?? array();
            # Configuração Paginate
            $totalItems = count($requestJSONform['objeto']);
            $itemsPerPage = 10; // Itens por página
            // $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = $request->getVar('page') ?? 1;
            # Constrção Paginate
            $pager = service('pager');
            $pager->setPath('intranet/painel/endpoint/master');
            $pager->makeLinks($currentPage, $itemsPerPage, $totalItems);
            # Finalização Paginate
            $requestJSONform['objeto']['list'] = $this->paginateArray($requestJSONform['objeto'], $currentPage, $itemsPerPage);
            $requestJSONform['objeto']['pager'] = $pager;
            #
            $requestJSONform = array();
            $apiRespond = [
                'status' => 'success',
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => $request->getMethod() ?? 'unknown',
                    'description' => 'API Description',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'result' => $processRequest,
                'loadView' => $loadView,
                'metadata' => [
                    'page_title' => 'Application title',
                    'getURI' => $this->uri->getSegments(),
                    // Você pode adicionar campos comentados anteriormente se forem relevantes
                    // 'method' => '__METHOD__',
                    // 'function' => '__FUNCTION__',
                ]
            ];
            if ($json == 1) {
                $response = $this->response->setJSON($apiRespond, 201);
            }
        } catch (\Exception $e) {
            $apiRespond = [
                'status' => 'error',
                'message' => $e->getMessage(),
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => $request->getMethod() ?? 'unknown',
                    'description' => 'API Criar Method',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                'metadata' => [
                    'page_title' => 'ERRO - API Method',
                    'getURI' => $this->uri->getSegments(),
                ]
            ];
            if ($json == 1) {
                $response = $this->response->setJSON($apiRespond, 500);
            }
        }
        if ($json == 1) {
            return $apiRespond;
        } else {
            return view($this->template, $apiRespond);
            // return $apiRespond;
        }
    }
}
