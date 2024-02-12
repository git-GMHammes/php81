<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DadodsPessoaisModel;
use Exception;

class DadosPessoaisEndPointController extends ResourceController
{
    use ResponseTrait;
    private $template = 'dadospessoais/template/main';
    private $message = 'dadospessoais/message';
    private $footer = 'dadospessoais/footer';
    private $head = 'dadospessoais/head';
    private $menu = 'dadospessoais/menu';
    private $ModelDadodsPessoais;
    private $uri;
    #
    public function __construct()
    {
        $this->ModelDadodsPessoais = new DadodsPessoaisModel();
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
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
        #
        $loadView = array(
            $this->head,
            $this->menu,
            $this->message,
            $this->footer,
        );
        try {
            # URI da API
            $uri = base_url() . '/sigla/rota/' . $parameter;
            # Decisão URI da API
            if ($processRequest !== array()) {
                $uri = base_url() . '/sigla/rota/path/path/' . $processRequest;
            } else {
                $uri = base_url() . '/sigla/rota/path/path/' . $parameter;
            }
            # Carrega a configuração de API
            $APIform = \Config\Services::curlrequest();
            # Recebe a API
            $requestAPIform = $APIform->request('GET', $uri);
            # Recebe o JSON da API
            $requestJSONform = json_decode($requestAPIform->getBody(), true);
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
        if ($parameter != 'json') {
            return $apiRespond;
            // return view($this->template, $apiRespond);
        } else {
            return $apiRespond;
        }
    }

    private function returnMyFunction($message = array(), $typeMessage, $dataValue = array())
    {
        // ['success', 'warning', 'danger'];
        if ($message !== array()) {
            $message['message'][$typeMessage] = $message;
            session()->set('message',  $message);
            session()->markAsTempdata('message', 5);
            if ($dataValue !== array()) {
                session()->set('value_form',  $dataValue);
            }
            session()->markAsTempdata('message', 15);
        }
        return (NULL);
    }

    private function token_csrf()
    {
        $token_csrf = md5(password_hash(time(), PASSWORD_DEFAULT));
        session()->set('token_csrf',  $token_csrf);
        session()->markAsTempdata('token_csrf', 1800);
        // myPrint($token_csrf, 'www\oficina\app\Controllers\CustomersEndPointController.php', true);
        return $token_csrf;
    }

    # Consumo de API
    # route GET /www/dadospessoais/endpoint/create/dadospessoais/(:any)
    # route POST /www/dadospessoais/endpoint/create/dadospessoais/(:any)
    # Informação sobre o controller
    # retorno do controller [VIEW]
    public function dbCreate($parameter = NULL)
    {
        $request = service('request');
        $processRequest = (array)$request->getVar();
        $json = $processRequest['json'] ?? 0;
        $id = (isset($processRequest['id'])) ? ('/' . $processRequest['id']) : ('/' . $parameter);
        $processRequest = eagarScagaire($processRequest);
        // myPrint($processRequest, 'dadospessoais/endpoint/CustomersEndPointController.php');
        #
        $loadView = array(
            $this->head,
            $this->menu,
            $this->message,
            // 'dadospessoais/teste_input',
            'dadospessoais/react/api/006_api_form',
            $this->footer,
        );
        try {
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
                return $response = $this->response->setJSON($apiRespond, 201);
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
            $response = $this->response->setJSON($apiRespond, 500);
        }
        if ($json == 1) {
            return $response;
        } else {
            return view($this->template, $apiRespond);
            // return $response;
        }
    }

    # Consumo de API
    # route GET /www/dadospessoais/endpoint/listar/array/(:any)
    # route POST /www/dadospessoais/endpoint/listar/array/(:any)
    # Informação sobre o controller
    # retorno do controller [VIEW]
    public function dbRead_array($parameter1 = NULL, $parameter2 = NULL)
    {
        $request = service('request');
        $processRequest = (array)$request->getVar();
        $json = $processRequest['json'] ?? 0;
        $id = (isset($processRequest['id'])) ? ('/' . $processRequest['id']) : ('/' . $parameter2);
        // $processRequest = eagarScagaire($processRequest);
        #
        switch ($parameter1) {
            case 'id':
                $react_parameter = 'dadospessoais/react/array/001_array_id';
                break;
            case 'paginator':
                $react_parameter = 'dadospessoais/react/array/003_array_table_paginator';
                break;
            case 'table':
                $react_parameter = 'dadospessoais/react/array/002_array_table';
                break;
            case 'filter':
                // myPrint('Aqui', 'dadospessoais/endpoint/CustomersEndPointController.php');
                $react_parameter = 'dadospessoais/react/array/004_array_table_filter';
                break;
            default:
                myPrint('Error: ' . $parameter1, 'dadospessoais/endpoint/CustomersEndPointController.php');
                break;
        };
        #
        $loadView = array(
            $this->head,
            $this->menu,
            $this->message,
            $react_parameter,
            $this->footer,
        );
        try {
            if ($id === '/') {
                $myEndPoint = myEndPoint('dadospessoais/api/listar', '123');
            } else {
                $myEndPoint = myEndPoint('dadospessoais/api/listar' . $id, '123');
            }
            $requestJSONform = (isset($myEndPoint['result'])) ? ($myEndPoint['result']) : (array());
            // myPrint($requestJSONform, '');
            #
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
                'result' => $requestJSONform,
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
            return $response;
        } else {
            // return $response;
            return view($this->template, $apiRespond);
        }
    }

    # Consumo de API
    # route GET /www/react/tabela/api/(:any)
    # route POST /www/react/tabela/api/(:any)
    # Informação sobre o controller
    # retorno do controller [VIEW]
    public function dbRead_api($parameter1 = NULL, $parameter2 = NULL)
    {
        $request = service('request');
        $processRequest = (array)$request->getVar();
        $json = $processRequest['json'] ?? 0;
        $id = (isset($processRequest['id'])) ? ('/' . $processRequest['id']) : ('/' . $parameter2);
        // $processRequest = eagarScagaire($processRequest);
        #
        switch ($parameter1) {
            case 'id':
                $react_parameter = 'dadospessoais/react/api/001_api_id';
                break;
            case 'paginator':
                $react_parameter = 'dadospessoais/react/api/003_api_table_paginator';
                break;
            case 'table':
                $react_parameter = 'dadospessoais/react/api/002_api_table';
                break;
            case 'filter':
                // myPrint('Aqui', 'dadospessoais/endpoint/CustomersEndPointController.php');
                $react_parameter = 'dadospessoais/react/api/004_api_table_filter';
                break;
            case 'all_in_one':
                $react_parameter = 'dadospessoais/react/api/005_api_all_in_one';
                break;
            default:
                myPrint('Error: ' . $parameter1, 'dadospessoais/endpoint/CustomersEndPointController.php');
                break;
        };
        #
        $loadView = array(
            $this->head,
            $this->menu,
            $this->message,
            $react_parameter,
            $this->footer,
        );
        try {
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
                'result' => $requestJSONform,
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
            return $response;
        } else {
            // return $response;
            return view($this->template, $apiRespond);
        }
    }
}
