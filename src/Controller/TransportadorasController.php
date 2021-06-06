<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Transportadoras Controller
 *
 * @property \App\Model\Table\TransportadorasTable $Transportadoras
 * @method \App\Model\Entity\Transportadora[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransportadorasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Enderecos'],
        ];
        $transportadoras = $this->paginate($this->Transportadoras);

        $this->set(compact('transportadoras'));
    }

    /**
     * View method
     *
     * @param string|null $id Transportadora id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transportadora = $this->Transportadoras->get($id, [
            'contain' => ['Enderecos', 'Entradas', 'Saidas'],
        ]);

        $this->set(compact('transportadora'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transportadora = $this->Transportadoras->newEmptyEntity();
        if ($this->request->is('post')) {
            $transportadora = $this->Transportadoras->patchEntity($transportadora, $this->request->getData());
            if ($this->Transportadoras->save($transportadora)) {
                $this->Flash->success(__('The transportadora has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transportadora could not be saved. Please, try again.'));
        }
        $enderecos = $this->Transportadoras->Enderecos->find('list', ['limit' => 200]);
        $this->set(compact('transportadora', 'enderecos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transportadora id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transportadora = $this->Transportadoras->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transportadora = $this->Transportadoras->patchEntity($transportadora, $this->request->getData());
            if ($this->Transportadoras->save($transportadora)) {
                $this->Flash->success(__('The transportadora has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transportadora could not be saved. Please, try again.'));
        }
        $enderecos = $this->Transportadoras->Enderecos->find('list', ['limit' => 200]);
        $this->set(compact('transportadora', 'enderecos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transportadora id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transportadora = $this->Transportadoras->get($id);
        if ($this->Transportadoras->delete($transportadora)) {
            $this->Flash->success(__('The transportadora has been deleted.'));
        } else {
            $this->Flash->error(__('The transportadora could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
