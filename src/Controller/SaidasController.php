<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Saidas Controller
 *
 * @property \App\Model\Table\SaidasTable $Saidas
 * @method \App\Model\Entity\Saida[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SaidasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lojas', 'Transportadoras'],
        ];
        $saidas = $this->paginate($this->Saidas);

        $this->set(compact('saidas'));
    }

    /**
     * View method
     *
     * @param string|null $id Saida id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saida = $this->Saidas->get($id, [
            'contain' => ['Lojas', 'Transportadoras', 'Itemsaidas'],
        ]);

        $this->set(compact('saida'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saida = $this->Saidas->newEmptyEntity();
        if ($this->request->is('post')) {
            $saida = $this->Saidas->patchEntity($saida, $this->request->getData());
            if ($this->Saidas->save($saida)) {
                $this->Flash->success(__('The saida has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saida could not be saved. Please, try again.'));
        }
        $lojas = $this->Saidas->Lojas->find('list', ['limit' => 200]);
        $transportadoras = $this->Saidas->Transportadoras->find('list', ['limit' => 200]);
        $this->set(compact('saida', 'lojas', 'transportadoras'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Saida id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saida = $this->Saidas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saida = $this->Saidas->patchEntity($saida, $this->request->getData());
            if ($this->Saidas->save($saida)) {
                $this->Flash->success(__('The saida has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saida could not be saved. Please, try again.'));
        }
        $lojas = $this->Saidas->Lojas->find('list', ['limit' => 200]);
        $transportadoras = $this->Saidas->Transportadoras->find('list', ['limit' => 200]);
        $this->set(compact('saida', 'lojas', 'transportadoras'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Saida id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saida = $this->Saidas->get($id);
        if ($this->Saidas->delete($saida)) {
            $this->Flash->success(__('The saida has been deleted.'));
        } else {
            $this->Flash->error(__('The saida could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
