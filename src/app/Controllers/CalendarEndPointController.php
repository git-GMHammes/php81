<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
// use App\Models\NomeModel;
use Exception;

class CalendarEndPointController extends ResourceController
{
    use ResponseTrait;
    private $template = 'calendar/template/main';
    private $message = 'calendar/message';
    private $footer = 'calendar/footer';
    private $head = 'calendar/head';
    private $menu = 'calendar/menu';
    private $ModelResponse;
    private $uri;
    #
    public function __construct()
    {
        // $this->ModelResponse = new NomeModel();
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
        return NULL;
    }
    private function paginateArray($data, $page, $perPage)
    {
        // Calcula o offset
        $offset = ($page - 1) * $perPage;

        // Retorna os itens da página atual
        return array_slice($data, $offset, $perPage);
    }
    #
    # route POST /www/sigla/rota
    # route GET /www/sigla/rota
    # Informação sobre o controller
    # retorno do controller [view]
    public function index($parameter = NULL)
    {
        $request = service('request');
        $processRequest = (array)$request->getVar();
        // $processRequest = eagarScagaire($processRequest);
        $json = $processRequest['json'] ?? 0;
        #
        $loadView = array(
            // $this->head,
            // $this->menu,
            // $this->message,
            // $this->footer,
            'react/calendar/main'
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

    # Consumo de API
    # route GET /www/calendar/endpoint/listar/(:any)
    # route POST /www/calendar/endpoint/listar/(:any)
    # Informação sobre o controller
    # retorno do controller [VIEW]
    public function dbRead($parameter1 = NULL, $parameter2 = NULL, $parameter3 = NULL)
    {
        $request = service('request');
        $processRequest = (array)$request->getVar();
        $json = $processRequest['json'] ?? 0;
        $ano = ($parameter1 !== NULL) ? ('/' . $parameter1) : (NULL);
        $mes = ($parameter1 !== NULL && $parameter2 !== NULL) ? ('/' . $parameter2) : (NULL);
        $dia = ($parameter1 !== NULL && $parameter2 !== NULL && $parameter3 !== NULL) ? ('/' . $parameter3) : (NULL);
        $data = $ano . $mes . $dia;
        $processRequest = eagarScagaire($processRequest);
        #
        $loadView = array(
            $this->head,
            $this->menu,
            $this->message,
            'calendar/calendar',
            $this->footer,
        );
        try {
            # URI da API                                                                                                          
            $endPoint['data'] = myEndPoint('calendar/api/listar' . $data, '123');
            $requestJSONform['data'] = $endPoint['data']['result'] ?? array();
            // myPrint($requestJSONform, 'src\app\Controllers\CalendarEndPointController.php');
            # Configuração Paginate
            $totalItems = count($requestJSONform['data']);
            $itemsPerPage = 10; // Itens por página
            // $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = $request->getVar('page') ?? 1;
            # Constrção Paginate
            $pager = service('pager');
            $pager->setPath('intranet/painel/endpoint/master');
            $pager->makeLinks($currentPage, $itemsPerPage, $totalItems);
            # Finalização Paginate
            $requestJSONform['data']['list'] = $this->paginateArray($requestJSONform['data'], $currentPage, $itemsPerPage);
            $requestJSONform['data']['pager'] = $pager;
            #
            $processRequest = $requestJSONform;
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
        // myPrint($apiRespond, 'src\app\Controllers\CalendarEndPointController.php');
        if ($json == 1) {
            return $response;
        } else {
            // return $response;
            return view($this->template, $apiRespond);
        }
    }
    # Consumo de API
    # route GET /www/calendar/endpoint/listar/(:any)
    # route POST /www/calendar/endpoint/listar/(:any)
    # Informação sobre o controller
    # retorno do controller [VIEW]
    public function main($parameter1 = NULL, $parameter2 = NULL, $parameter3 = NULL)
    {
        $request = service('request');
        $processRequest = (array)$request->getVar();
        $json = $processRequest['json'] ?? 0;
        $ano = ($parameter1 !== NULL) ? ('/' . $parameter1) : (NULL);
        $mes = ($parameter1 !== NULL && $parameter2 !== NULL) ? ('/' . $parameter2) : (NULL);
        $dia = ($parameter1 !== NULL && $parameter2 !== NULL && $parameter3 !== NULL) ? ('/' . $parameter3) : (NULL);
        if (
            is_numeric($parameter1)
            && is_numeric($parameter2)
            && is_numeric($parameter3)
        ) {
            $data = $ano . $mes . $dia;
        } else {
            $data = NULL;
        }
        $processRequest = eagarScagaire($processRequest);
        #
        $loadView = array(
            $this->head,
            $this->menu,
            $this->message,
            'calendar/main',
            $this->footer,
        );
        try {
            # URI da API                                                                                                          
            $endPoint['data'] = myEndPoint('calendar/api/listar' . $data, '123');
            $requestJSONform['data'] = $endPoint['data']['result'] ?? array();
            // myPrint($requestJSONform, 'src\app\Controllers\CalendarEndPointController.php');
            # Configuração Paginate
            $totalItems = count($requestJSONform['data']);
            $itemsPerPage = 10; // Itens por página
            // $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = $request->getVar('page') ?? 1;
            # Constrção Paginate
            $pager = service('pager');
            $pager->setPath('intranet/painel/endpoint/master');
            $pager->makeLinks($currentPage, $itemsPerPage, $totalItems);
            # Finalização Paginate
            $requestJSONform['data']['list'] = $this->paginateArray($requestJSONform['data'], $currentPage, $itemsPerPage);
            $requestJSONform['data']['pager'] = $pager;
            #
            $processRequest = $requestJSONform;
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
        // myPrint($apiRespond, 'src\app\Controllers\CalendarEndPointController.php');
        if ($json == 1) {
            return $response;
        } else {
            // return $response;
            return view($this->template, $apiRespond);
        }
    }
}
