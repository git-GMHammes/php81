<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CandidatoModel;
use Exception;

class CandidatoApiController extends ResourceController
{
    use ResponseTrait;
    private $ModelCandidato;
    private $dbFields;
    private $uri;

    public function __construct()
    {
        $this->ModelCandidato = new CandidatoModel();
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
        $processRequest = (array)$request->getVar();
        // $uploadedFiles = $request->getFiles();
        $json = $processRequest['json'] ?? 0;
        // $processRequest = eagarScagaire($processRequest);
        #
        try {
            if (isset($processRequest['id'])) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelResponse
                //    ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelResponse
                //    ->where('id', $processRequest['id'])
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
                #
                // $dbResponse[] = $this->ModelResponse
                //     ->dBupdate($processRequest['id'], $processRequest);
                #
                // $dbResponse[] = $this->ModelResponse
                //     ->where('id', $processRequest['id'])
                //     ->dBdelete();
                #
            } elseif ($parameter !== NULL) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelResponse
                //     ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelResponse
                //     ->where('id', $parameter)
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
                #
                // $dbResponse[] = $this->ModelResponse
                //     ->dBupdate($parameter, $processRequest);
                #
                // $dbResponse[] = $this->ModelResponse
                //     ->where('id', $parameter)
                //     ->dBdelete();
                #
            } else {
                // $dbResponse[] = $this->ModelResponse
                //     ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelResponse
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->findAll();
            };
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

    private function validtoken_csrf($token)
    {
        if ($token = '$ywB9i/CRwduLN0lgDED2jR.UrpxAw1eHBThgNYG.xfBfrhHr8IBOY2') {
            return true;
        }
        if (session()->get('token_csrf')) {
            $token_csrf = session()->get('token_csrf');
        } else {
            $token_csrf = 'FALSE';
        }
        if ($token_csrf == $token) {
            return true;
        } else {
            return false;
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

    private function dbFields($processRequestFields = array())
    {
        $dbCreate = array();
        (isset($processRequestFields['name'])) ? ($dbCreate['name'] = $processRequestFields['name']) : (NULL);
        (isset($processRequestFields['mail'])) ? ($dbCreate['mail'] = $processRequestFields['mail']) : (NULL);
        (isset($processRequestFields['fieldForm'])) ? ($dbCreate['fieldDb03'] = $processRequestFields['fieldForm']) : (NULL);
        (isset($processRequestFields['fieldForm'])) ? ($dbCreate['fieldDb04'] = $processRequestFields['fieldForm']) : (NULL);
        (isset($processRequestFields['fieldForm'])) ? ($dbCreate['fieldDb05'] = $processRequestFields['fieldForm']) : (NULL);
        (isset($processRequestFields['fieldForm'])) ? ($dbCreate['fieldDb06'] = $processRequestFields['fieldForm']) : (NULL);
        (isset($processRequestFields['fieldForm'])) ? ($dbCreate['fieldDb07'] = $processRequestFields['fieldForm']) : (NULL);
        (isset($processRequestFields['created_at'])) ? ($dbCreate['created_at'] = $processRequestFields['created_at']) : (NULL);
        (isset($processRequestFields['updated_at'])) ? ($dbCreate['updated_at'] = $processRequestFields['updated_at']) : (NULL);
        return ($dbCreate);
    }

    private function newRegister($parameter)
    {
        if ($parameter === 'new') {
            $this->ModelCandidato->dbCreate(['name' => 'Candidato']);
            $id = ($this->ModelCandidato->affectedRows() > 0) ? ($this->ModelCandidato->insertID()) : (NULL);
            return $id;
        } else {
            return false;
        }
    }

    # route POST /www/candidato/api/criar/(:any)
    # route GET /www/candidato/api/criar/(:any)
    # route POST /www/candidato/api/atualizar/(:any)
    # route GET /www/candidato/api/atualizar/(:any)
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function create_update($parameter = NULL)
    {
        $newParameter = $this->newRegister($parameter);
        if ($newParameter) {
            return $this->response->setJSON($newParameter, 500);
        }
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array)$request->getVar();
        // $uploadedFiles = $request->getFiles();
        $token_csrf = ($processRequest['token_csrf'] ?? NULL);
        $json = ($processRequest['json'] ?? 0);
        $choice_update = (isset($processRequest['id'])) ? (true) : (false);
        // myPrint($processRequest, 'src\app\Controllers\CandidatoController.php Linha 195');
        $processRequest = eagarScagaire($processRequest);
        #
        // $processRequest = array();
        try {
            if ($choice_update === true) {
                if ($this->validtoken_csrf($token_csrf)) {
                    $this->ModelCandidato->dbUpdate(
                        $processRequest['id'],
                        $this->dbFields($processRequest)
                    );
                    if ($this->ModelCandidato->affectedRows() > 0) {
                        $this->returnMyFunction(['Update realizado com sucesso'], 'success');
                        $processRequestSuccess = true;
                    }
                }
            } elseif ($choice_update === false) {
                if ($this->validtoken_csrf($token_csrf)) {
                    // myPrint($this->dbFields($processRequest), 'src\app\Controllers\CandidatoController.php Linha 195');
                    // $this->ModelCandidato->dbCreate($this->dbFields($processRequest));
                    $this->ModelCandidato->dbCreate($processRequest);
                    $id = ($this->ModelCandidato->affectedRows() > 0) ? ($this->ModelCandidato->insertID()) : (NULL);
                    if ($this->ModelCandidato->affectedRows() > 0) {
                        $this->returnMyFunction(['Create realizado com sucesso'], 'success');
                        $processRequestSuccess = true;
                    }
                }
            } else {
                $this->returnMyFunction(['ERRO: Dados enviados inválidos'], 'danger');
            };
            $status = (!isset($processRequestSuccess) || $processRequestSuccess !== true) ? ('trouble') : ('success');
            $message = (!isset($processRequestSuccess) || $processRequestSuccess !== true) ? ('Erro - requisição que foi bem-formada mas não pôde ser seguida devido a erros semânticos.') : ('API loading data (dados para carregamento da API)');
            $cod_http = (!isset($processRequestSuccess) || $processRequestSuccess !== true) ? (422) : (201);
            $apiRespond = [
                'status' => $status,
                'message' => $message,
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
            $response = $this->response->setJSON($apiRespond, $cod_http);
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
        if ($json) {
            return $response;
            // return redirect()->to('project/endpoint/parameter/parameter/' . $parameter);
        } else {
            return $response;
            // return redirect()->back();
        }
    }

    # route POST /www/candidato/endpoint/listar/(:any)
    # route GET /www/candidato/endpoint/listar/(:any)
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function dbRead($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array)$request->getVar();
        $json = ($processRequest['json'] ?? 0);
        // $processRequest = eagarScagaire($processRequest);
        #
        try {
            if (isset($processRequest['id'])) {
                $dbResponse = $this->ModelCandidato
                   ->where('id', $processRequest['id'])
                    ->where('deleted_at', NULL)
                    ->orderBy('updated_at', 'asc')
                    ->dBread()
                    ->find();
                #
            } elseif ($parameter !== NULL) {
                $dbResponse = $this->ModelCandidato
                    ->where('id', $parameter)
                    ->where('deleted_at', NULL)
                    ->orderBy('updated_at', 'asc')
                    ->dBread()
                    ->find();
                #
            } else {
                $dbResponse = $this->ModelCandidato
                    ->where('deleted_at', NULL)
                    ->orderBy('updated_at', 'asc')
                    ->dBread()
                    ->findAll();
            };
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
        if($json == 1){
            return $response;
            // return redirect()->to('project/endpoint/parameter/parameter/' . $parameter);
        }else{
            return $response;
            // return redirect()->back();
        }
    }
}
