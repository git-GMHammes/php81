<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
// use App\Models\NomeModel;
use Exception;

class MyUploadApi extends ResourceController
{
    use ResponseTrait;
    private $ModelResponse;
    private $dbFields;
    private $uri;

    public function __construct()
    {
        // $this->ModelResponse = new NomeModel();
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
    }

    # route POST /www/sigla/rota
    # route GET /www/sigla/rota
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function index($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array)$request->getVar();
        // $processRequest = eagarScagaire($processRequest);
        #
        try {
            if ($processRequest !== array()) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelResponse->dBcreate($processRequest);
                // $dbResponse[] = $this->ModelResponse->dBread($IdUFF = NULL);
                // $dbResponse[] = $this->ModelResponse->dBupdate($IdUFF = NULL);
                // $dbResponse[] = $this->ModelResponse->where('deleted_at !=', NULL)->dBdelete();
            } else {
                # CRUD da Model
                // $dbResponse[] = $this->ModelResponse->dBcreate($parameter);
                // $dbResponse[] = $this->ModelResponse->dBread($parameter = NULL);
                // $dbResponse[] = $this->ModelResponse->dBupdate($parameter = NULL);
                // $dbResponse[] = $this->ModelResponse->where('deleted_at !=', NULL)->dBdelete();
            };
            $apiRespond = [
                'status' => 'success',
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => 'GET/POST',
                    'description' => 'API Description',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'result' => $processRequest,
                'metadata' => [
                    'page_title' => 'Application title'
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
            );
            // $this->returnFunction(array($e->getMessage()), 'danger',);
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

    # route POST /www/upload/api/form_upload/(:any)
    # route GET /www/upload/api/form_upload/(:any)
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function formUpload($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array)$request->getVar();
        $uploadedFiles = $request->getFiles();
        $processRequest = eagarScagaire($processRequest);
        #
        myPrint($processRequest, '', true);
        myPrint($uploadedFiles, '');
        #
        // Recebendo todos os arquivos enviados no array 'up1'
        $uploadedFiles = $request->getFiles()['up1'];

        if (!empty($uploadedFiles)) {
            foreach ($uploadedFiles as $fileObject) {
                if ($fileObject->isValid() && !$fileObject->hasMoved()) {
                    $newName = $fileObject->getRandomName();
                    $fileObject->move(WRITEPATH . 'uploads', $newName);
                    // Implemente aqui a lógica adicional necessária, como salvar informações do arquivo no banco de dados
                } else {
                    // Tratar erros de upload para cada arquivo individualmente
                }
            }
        }
        myPrint($processRequest, '', true);
        myPrint($uploadedFiles, '');
        #
        if ($this->request->getMethod() === 'post' && $this->validate([
            'up1' => 'uploaded[up1]|max_size[up1,1024]|ext_in[up1,png,jpg,gif]',
            'campo1' => 'required',
            'campo2' => 'required',
            'campo3' => 'required',
            'radio-stacked' => 'required'
        ])) {
            $file = $this->request->getFile('up1');
            if ($file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $fileName);

                // Aqui você pode processar os outros dados do formulário
                $campo1 = $this->request->getVar('campo1');
                $campo2 = $this->request->getVar('campo2');
                $campo3 = $this->request->getVar('campo3');
                $radio = $this->request->getVar('radio-stacked');

                // Implemente sua lógica aqui (salvar no banco de dados, realizar operações, etc.)
                myPrint($file, 'src\app\Controllers\MyUploadApi.php');
            }
        }

        // Tratamento de erros ou retorno para o formulário
        myPrint($this->validator->getErrors(), 'src\app\Controllers\MyUploadApi.php');
        #
        try {
            if ($processRequest !== array()) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelResponse->dBcreate($processRequest);
                // $dbResponse[] = $this->ModelResponse->dBread($IdUFF = NULL);
                // $dbResponse[] = $this->ModelResponse->dBupdate($IdUFF = NULL);
                // $dbResponse[] = $this->ModelResponse->where('deleted_at !=', NULL)->dBdelete();
            } else {
                # CRUD da Model
                // $dbResponse[] = $this->ModelResponse->dBcreate($parameter);
                // $dbResponse[] = $this->ModelResponse->dBread($parameter = NULL);
                // $dbResponse[] = $this->ModelResponse->dBupdate($parameter = NULL);
                // $dbResponse[] = $this->ModelResponse->where('deleted_at !=', NULL)->dBdelete();
            };
            $apiRespond = [
                'status' => 'success',
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                'api' => [
                    'version' => '1.0',
                    'method' => 'GET/POST',
                    'description' => 'API Description',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'result' => $processRequest,
                'metadata' => [
                    'page_title' => 'Application title'
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
                    'method' => 'GET/POST',
                    'description' => 'API Criar Noticia',
                    'content_type' => 'application/x-www-form-urlencoded'
                ],
                'metadata' => [
                    'page_title' => 'ERRO - API Criar Noticia'
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
}
