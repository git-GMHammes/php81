<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Exception;

class UserApiController extends ResourceController
{
    use ResponseTrait;
    private $ModelUser;
    private $dbFields;
    private $uri;

    public function __construct()
    {
        $this->ModelUser = new UserModel();
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
        $uploadedFiles = $request->getFiles();
        $json = $processRequest['json'] ?? 0;
        // $processRequest = eagarScagaire($processRequest);
        #
        try {
            if (isset($processRequest['id'])) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelResponse
                //     ->dBcreate($processRequest);
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

    private function dbFields($processRequestFields = array())
    {
        $dbCreate = array();
        (isset($processRequestFields['id'])) ? ($dbCreate['id'] = $processRequestFields['id']) : (NULL);
        (isset($processRequestFields['cpf'])) ? ($dbCreate['cpf'] = $processRequestFields['cpf']) : (NULL);
        (isset($processRequestFields['token'])) ? ($dbCreate['token'] = substr($processRequestFields['token'], 0, 6)) : (NULL);
        (isset($processRequestFields['full_name'])) ? ($dbCreate['name'] = $processRequestFields['full_name']) : (NULL);
        (isset($processRequestFields['email_server'])) ? ($dbCreate['mail'] = $processRequestFields['email_server']) : (NULL);
        (isset($processRequestFields['cell_phone'])) ? ($dbCreate['celhpone'] = $processRequestFields['cell_phone']) : (NULL);
        (isset($processRequestFields['cpf_validation'])) ? ($dbCreate['cpf_validation'] = $processRequestFields['cpf_validation']) : (NULL);
        return ($dbCreate);
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

    private function avoids_duplicity($cpf, $email)
    {
        myPrint($cpf, 'src\app\Controllers\UserApiController.php', true);
        myPrint($email, 'src\app\Controllers\UserApiController.php', true);
        $confirm_cpf = $this->ModelUser->where('cpf', $cpf)->dbRead()->find();
        $confirm_email = $this->ModelUser->where('mail', $email)->dbRead()->find();
        myPrint($confirm_cpf, 'src\app\Controllers\UserApiController.php', true);
        myPrint($confirm_email, 'src\app\Controllers\UserApiController.php', true);
        return FALSE;
    }

    # route POST /www/calendar/usuario/api/criar/(:any)
    # route GET /www/calendar/usuario/api/criar/(:any)
    # route POST /www/crud/api/atualizar/(:any)
    # route GET /www/crud/api/atualizar/(:any)
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function create_update($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array)$request->getVar();
        $uploadedFiles = $request->getFiles();
        $token_csrf = ($processRequest['token_csrf'] ?? NULL);
        $json = ($processRequest['json'] ?? 0);
        $choice_update = (isset($processRequest['id'])) ? (true) : (false);
        $processRequest = eagarScagaire($processRequest);
        if (isset($processRequest['cpf'])) {
            $processRequest['cpf_validation'] = myCPFvalidation($processRequest['cpf']) ? ('Y') : ('N');
        } else {
            $processRequest['cpf'] = NULL;
        }
        $processRequest['mail_server'] = isset($processRequest['mail_server']) ? ($processRequest['mail_server']) : (NULL);
        $processRequest['token'] = time();
        // myPrint($processRequest, 'src\app\Controllers\UserApiController.php', true);
        #
        // $processRequest = array();
        try {
            if ($choice_update === true) {
                if ($this->validtoken_csrf($token_csrf)) {
                    $this->ModelUser->dbUpdate(
                        $processRequest['id'],
                        $this->dbFields($processRequest)
                    );
                    if ($this->ModelUser->affectedRows() > 0) {
                        $this->returnMyFunction(['Update realizado com sucesso'], 'success');
                        $processRequestSuccess = true;
                    }
                }
            } elseif ($choice_update === false) {
                if ($this->validtoken_csrf($token_csrf)) {
                    // myPrint($this->dbFields($processRequest), 'src\app\Controllers\UserApiController.php');
                    if ($this->avoids_duplicity($processRequest['cpf'], $processRequest['mail_server'])) {
                        $this->ModelUser->dbCreate($this->dbFields($processRequest));
                    }
                    $id = ($this->ModelUser->affectedRows() > 0) ? ($this->ModelUser->insertID()) : (NULL);
                    if ($this->ModelUser->affectedRows() > 0) {
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
            // return $response;
            // return redirect()->to('project/endpoint/parameter/parameter/' . $parameter);
        } else {
            // return $response;
            // return redirect()->back();
        }
    }
}
