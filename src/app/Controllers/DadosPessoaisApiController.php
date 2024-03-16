<?php
// src\app\Controllers\DadosPessoaisApiController.php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DadosPessoaisModel;
use Exception;

class DadosPessoaisApiController extends ResourceController
{
    use ResponseTrait;
    private $ModelDadosPessoais;
    private $dbFields;
    private $uri;

    public function __construct()
    {
        $this->ModelDadosPessoais = new DadosPessoaisModel();
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
        $json = $processRequest['json'] ?? 0;
        // $processRequest = eagarScagaire($processRequest);
        #
        try {
            if (isset ($processRequest['id'])) {
                # CRUD da Model
                $dbResponse[] = $this->ModelDadosPessoais
                    ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //    ->where('id', $processRequest['id'])
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->dBupdate($processRequest['id'], $processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->where('id', $processRequest['id'])
                //     ->dBdelete();
                #
            } elseif ($parameter !== NULL) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->where('id', $parameter)
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->dBupdate($parameter, $processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->where('id', $parameter)
                //     ->dBdelete();
                #
            } else {
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
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

    private function dbFields($processRequestFields = array())
    {
        $dbCreate = array();
        (isset ($processRequestFields['address_complement'])) ? ($dbCreate['address_complement'] = $processRequestFields['address_complement']) : (NULL);
        (isset ($processRequestFields['address_code'])) ? ($dbCreate['address_code'] = $processRequestFields['address_code']) : (NULL);
        (isset ($processRequestFields['personType'])) ? ($dbCreate['person_type'] = $processRequestFields['personType']) : (NULL);
        (isset ($processRequestFields['birth_date'])) ? ($dbCreate['birth_date'] = $processRequestFields['birth_date']) : (NULL);
        (isset ($processRequestFields['telephone'])) ? ($dbCreate['telephone'] = $processRequestFields['telephone']) : (NULL);
        (isset ($processRequestFields['full_name'])) ? ($dbCreate['full_name'] = $processRequestFields['full_name']) : (NULL);
        (isset ($processRequestFields['gender'])) ? ($dbCreate['gender'] = $processRequestFields['gender']) : (NULL);
        (isset ($processRequestFields['order'])) ? ($dbCreate['order'] = $processRequestFields['order']) : (NULL);
        (isset ($processRequestFields['mail'])) ? ($dbCreate['mail'] = $processRequestFields['mail']) : (NULL);
        (isset ($processRequestFields['city'])) ? ($dbCreate['city'] = $processRequestFields['city']) : (NULL);
        (isset ($processRequestFields['cpf'])) ? ($dbCreate['cpf'] = $processRequestFields['cpf']) : (NULL);
        (isset ($processRequestFields['id'])) ? ($dbCreate['id'] = $processRequestFields['id']) : (NULL);
        (isset ($processRequestFields['rg'])) ? ($dbCreate['rg'] = $processRequestFields['rg']) : (NULL);
        (isset ($processRequestFields['uf'])) ? ($dbCreate['uf'] = $processRequestFields['uf']) : (NULL);
        // myPrint($dbCreate, 'src\app\Controllers\DadosPessoaisApiController.php');
        return ($dbCreate);
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
        return (NULL);
    }

    # route POST /www/dadospessoais/api/criar/(:any)
    # route GET /www/dadospessoais/api/criar/(:any)
    # route POST /www/dadospessoais/api/atualizar/(:any)
    # route GET /www/dadospessoais/api/atualizar/(:any)
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function create_update($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array) $request->getVar();
        // myPrint($processRequest, 'src\app\Controllers\DadosPessoaisApiController.php', true);
        $token_csrf = ($processRequest['token_csrf'] ?? NULL);
        $json = ($processRequest['json'] ?? FALSE);
        $id = (isset ($processRequest['id'])) ? (true) : (false);
        $processRequest = eagarScagaire($processRequest);
        #
        // myPrint($processRequest, 'src\app\Controllers\DadosPessoaisApiController.php');
        // $processRequest = array();
        try {
            if ($id === true) {
                if ($this->validtoken_csrf($token_csrf)) {
                    $this->ModelDadosPessoais->dbUpdate(
                        $processRequest['id'],
                        $this->dbFields($processRequest)
                    );
                    if ($this->ModelDadosPessoais->affectedRows() > 0) {
                        $this->returnMyFunction(['Update realizado com sucesso'], 'success');
                        $processRequestSuccess = true;
                    }
                }
            } elseif ($id === false) {
                if ($this->validtoken_csrf($token_csrf)) {
                    // myPrint($this->dbFields($processRequest), 'src\app\Controllers\DadosPessoaisApiController.php');
                    $this->ModelDadosPessoais->dbCreate($this->dbFields($processRequest));
                    if ($this->ModelDadosPessoais->affectedRows() > 0) {
                        $this->returnMyFunction(['Create realizado com sucesso'], 'success');
                        $processRequestSuccess = true;
                    }
                }
            } else {
                $this->returnMyFunction(['ERRO: Dados enviados inválidos'], 'danger');
            }
            ;
            $status = (!isset ($processRequestSuccess) || $processRequestSuccess !== true) ? ('trouble') : ('success');
            $message = (!isset ($processRequestSuccess) || $processRequestSuccess !== true) ? ('Erro - requisição que foi bem-formada mas não pôde ser seguida devido a erros semânticos.') : ('API loading data (dados para carregamento da API)');
            $cod_http = (!isset ($processRequestSuccess) || $processRequestSuccess !== true) ? (422) : (201);
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
            return redirect()->back();
            // return $response;
        }
    }

    # route POST /www/dadospessoais/api/exibir/(:any)
    # route GET /www/dadospessoais/api/exibir/(:any)
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function dbRead($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array) $request->getVar();
        // $processRequest = eagarScagaire(processRequest);
        #
        try {
            if (isset ($processRequest['id'])) {
                $dbResponse = $this->ModelDadosPessoais
                    ->where('id', $processRequest['id'])
                    ->where('deleted_at', NULL)
                    ->orderBy('order', 'asc')
                    ->dBread()
                    ->find();
                #
            } elseif ($parameter !== NULL) {
                $dbResponse = $this->ModelDadosPessoais
                    ->where('id', $parameter)
                    ->where('deleted_at', NULL)
                    ->orderBy('order', 'asc')
                    ->dBread()
                    ->find();
                #
            } else {
                $dbResponse = $this->ModelDadosPessoais
                    ->where('deleted_at', NULL)
                    ->orderBy('order', 'asc')
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
        if ($parameter != 'json') {
            return $response;
            // return redirect()->back();
            // return redirect()->to('project/endpoint/parameter/parameter/' . $parameter);
        } else {
            return $response;
        }
    }

    # route POST /www/sigla/rota
    # route GET /www/sigla/rota
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function dbDelete($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array) $request->getVar();
        $json = $processRequest['json'] ?? 0;
        // $processRequest = eagarScagaire($processRequest);
        #
        try {
            if (isset ($processRequest['id'])) {
                # CRUD da Model
                $dbResponse[] = $this->ModelDadosPessoais
                    ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //    ->where('id', $processRequest['id'])
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->dBupdate($processRequest['id'], $processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->where('id', $processRequest['id'])
                //     ->dBdelete();
                #
            } elseif ($parameter !== NULL) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->where('id', $parameter)
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->dBupdate($parameter, $processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->where('id', $parameter)
                //     ->dBdelete();
                #
            } else {
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->dBcreate($processRequest);
                #
                // $dbResponse[] = $this->ModelDadosPessoais
                //     ->where('deleted_at', NULL)
                //     ->orderBy('updated_at', 'asc')
                //     ->dBread()
                //     ->find();
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
            }
        }
    }
}
