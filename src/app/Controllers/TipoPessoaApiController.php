<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\TipoPessoaModel;
use Exception;

class TipoPessoaApiController extends ResourceController
{
    use ResponseTrait;
    private $ModelTipoPessoa;
    private $dbFields;
    private $uri;

    public function __construct()
    {
        $this->ModelTipoPessoa = new TipoPessoaModel();
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
    }
    #
    # route POST /www/sigla/rota
    # route GET /www/sigla/rota
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function index($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array) $request->getVar();
        $uploadedFiles = $request->getFiles();
        $json = $processRequest['json'] ?? 0;
        // $processRequest = eagarScagaire($processRequest);
        #
        try {
            if (isset($processRequest['id'])) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelTipoPessoa
                //    ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelTipoPessoa
                //    ->where('id', $processRequest['id'])
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
                #
                // $dbResponse[] = $this->ModelTipoPessoa
                //     ->dBupdate($processRequest['id'], $processRequest);
                #
                // $dbResponse[] = $this->ModelTipoPessoa
                //     ->where('id', $processRequest['id'])
                //     ->dBdelete();
                #
            } elseif ($parameter !== NULL) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelTipoPessoa
                //     ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelTipoPessoa
                //     ->where('id', $parameter)
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
                #
                // $dbResponse[] = $this->ModelTipoPessoa
                //     ->dBupdate($parameter, $processRequest);
                #
                // $dbResponse[] = $this->ModelTipoPessoa
                //     ->where('id', $parameter)
                //     ->dBdelete();
                #
            } else {
                // $dbResponse[] = $this->ModelTipoPessoa
                //     ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelTipoPessoa
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->findAll();
            }
            ;
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
                'metadata' => [
                    'page_title' => 'Application title',
                    'getURI' => $this->uri->getSegments(),
                    // Você pode adicionar campos comentados anteriormente se forem relevantes
                    // 'method' => '__METHOD__',
                    // 'function' => '__FUNCTION__',
                ]
            ];
            $response = $this->response->setJSON($apiRespond, 201);
        } catch (\Exception $e) {
            $apiRespond = array(
                'message' => array('danger' => $e->getMessage()),
                'page_title' => 'Application title',
                'getURI' => $this->uri->getSegments(),
            );
            // $this->returnFunction(array($e->getMessage()), 'danger',);
            $response = $this->response->setJSON($apiRespond, 500);
            if ($json == 1) {
                return $response;
                // return redirect()->back();
                // return redirect()->to('project/endpoint/parameter/parameter/' . $parameter);
            } else {
                return $response;
                // return redirect()->back();
                // return redirect()->to('project/endpoint/parameter/parameter/' . $parameter);
            }
        }
    }

    # route POST /www/tipopessoa/api/exibir/(:any)
    # route GET /www/tipopessoa/api/exibir/(:any)
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function dbRead($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array) $request->getVar();
        $json = ($processRequest['json'] ?? 0);
        // $processRequest = eagarScagaire($processRequest);
        #
        try {
            if (isset($processRequest['id'])) {
                $dbResponse = $this->ModelTipoPessoa
                   ->where('id', $processRequest['id'])
                    ->where('deleted_at', NULL)
                    ->orderBy('ordem', 'asc')
                    ->dBread()
                    ->find();
                #
            } elseif ($parameter !== NULL) {
                $dbResponse = $this->ModelTipoPessoa
                    ->where('id', $parameter)
                    ->where('deleted_at', NULL)
                    ->orderBy('ordem', 'asc')
                    ->dBread()
                    ->find();
                #
            } else {
                $dbResponse = $this->ModelTipoPessoa
                    ->where('deleted_at', NULL)
                    ->orderBy('ordem', 'asc')
                    ->dBread()
                    ->findAll();
            }
            ;
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
                'result' => $dbResponse,
                'metadata' => [
                    'page_title' => 'Application title',
                    'getURI' => $this->uri->getSegments(),
                    // Você pode adicionar campos comentados anteriormente se forem relevantes
                    // 'method' => '__METHOD__',
                    // 'function' => '__FUNCTION__',
                ]
            ];
            $response = $this->response->setJSON($apiRespond, 201);
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
            // return redirect()->to('project/endpoint/parameter/parameter/' . $parameter);
        } else {
            return $response;
            // return redirect()->back();
        }
    }
}
?>