<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class ServicesController extends AppController
{
    public function addservice() {
        $services = $this->fetchTable('Services');
        $resultado = null;
        $statusCode = 200;

        $form = $this->request->getData();
        $resultado = $this->verificaFoto($form);
        if (!empty($resultado)) {
            return $this->response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withStatus(403)
                ->withType("application/json")
                ->withStringBody(json_encode($resultado));
        }

        try {
            $nomeArquivo = date('Y-m-d_H:i:s') . '_' . hash('sha512', date('Y-m-d H:i:s')) . '.' . explode('/', $form['imageFile']->getClientMediaType())[1];
            $dados = $form;
            $dados['imageFile'] = $nomeArquivo;
            $service = $services->newEmptyEntity();
            $service = $services->patchEntity($service, $dados);
            $services->saveOrFail($service);
            $resultado = 'Serviço adicionado com sucesso.';

            if (!$this->salvarFotos($form, $nomeArquivo, 'icones')) {
                $services->delete($service);
                $resultado = 'Erro interno, tente novamente mais tarde.';
            }
        } catch (\Exception $e) {
            $resultado = $e->getMessage();
            $statusCode = 500;
        }

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType("application/json")
            ->withStringBody(json_encode($resultado));
    }

    public function listservice() {
        $services = $this->fetchTable('Services');
        $resultado = null;
        $statusCode = 200;

        if (empty($this->request->getData()['id'])) {
            $resp = $services->find()->where(['ativo' => 'S']);
        } else {
            $resp = $services->find()->where(['id' => $this->request->getData()['id']])->where(['ativo' => 'S']);
        }
        $resultado = $resp->toArray();

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType("application/json")
            ->withStringBody(json_encode($resultado));
    }

    public function addservicerequest() {
        $requests = $this->fetchTable('Servicerequests');
        $resultado = null;
        $statusCode = 200;

        $form = $this->request->getData();
        try {
            $nomeArquivo = date('Y-m-d_H:i:s') . '_' . hash('sha512', date('Y-m-d H:i:s')) . '.' . explode('/', $form['imageFile']->getClientMediaType())[1];
            $dados = $form;
            $dados['imageFile'] = $nomeArquivo;
            $dados['user_id'] = $this->request->getHeader('user')[0];
            $request = $requests->newEmptyEntity();
            $request = $requests->patchEntity($request, $dados);
            $requests->saveOrFail($request);
            $resultado = 'Solicitação enviada com sucesso.';

            if (!$this->salvarFotos($form, $nomeArquivo, 'solicitacoes')) {
                $requests->delete($request);
                $resultado = 'Erro interno, tente novamente mais tarde.';
            }
        } catch (\Exception $e) {
            $resultado = $e->getMessage();
            $statusCode = 500;
        }

        return $this->response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withStatus($statusCode)
            ->withType("application/json")
            ->withStringBody(json_encode($resultado));
    }
}
