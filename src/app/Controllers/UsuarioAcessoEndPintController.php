<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
// use App\Models\NomeModel;
use Exception;

class UsuarioAcessoEndPintController extends ResourceController
{
    use ResponseTrait;
    private $template = 'acesso/template/main';
    private $message = 'acesso/message';
    private $footer = 'acesso/footer';
    private $head = 'acesso/head';
    private $menu = 'acesso/menu';
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
            if (isset ($requestJSONform['objeto'])) {
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
    private function paginateArray($data, $page, $perPage)
    {
        // Calcula o offset
        $offset = ($page - 1) * $perPage;

        // Retorna os itens da página atual
        return array_slice($data, $offset, $perPage);
    }

    # Consumo de API
    # route GET /www/acesso/usuario/endpoint/login/(:any)
    # route POST /www/acesso/usuario/endpoint/login/(:any)
    # Informação sobre o controller
    # retorno do controller [VIEW]
    public function auth($parameter = NULL)
    {
        $request = service('request');
        $processRequest = (array) $request->getVar();
        $json = $processRequest['json'] ?? 0;
        $id = (isset ($processRequest['id'])) ? ('/' . $processRequest['id']) : ('/' . $parameter);
        // $processRequest = eagarScagaire($processRequest);

        #
        $loadView = array(
            $this->head,
            $this->menu,
            'acesso/login/main',
            $this->message,
            $this->footer,
        );
        try {
            $requestJSONform['menu_nav'] = $parameter;
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
            return $apiRespond;
        } else {
            return view($this->template, $apiRespond);
            // return $apiRespond;
        }
    }
}

