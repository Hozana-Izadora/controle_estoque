<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fornecedors Controller
 *
 * @property \App\Model\Table\FornecedorsTable $Fornecedors
 * @method \App\Model\Entity\Fornecedor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FornecedorsController extends AppController
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
        $fornecedors = $this->paginate($this->Fornecedors);

        $this->set(compact('fornecedors'));
    }

    /**
     * View method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fornecedor = $this->Fornecedors->get($id, [
            'contain' => ['Enderecos', 'Produtos'],
        ]);

        $this->set(compact('fornecedor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fornecedor = $this->Fornecedors->newEmptyEntity();
        if ($this->request->is('post')) {
            $fornecedor = $this->Fornecedors->patchEntity($fornecedor, $this->request->getData());
            if ($this->Fornecedors->save($fornecedor)) {
                $this->Flash->success(__('O Fornecedor foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Fornecedor não foi salvo. Por favor, tente novamente.'));
        }
        $enderecos = $this->Fornecedors->Enderecos->find('list', ['limit' => 200]);
        $this->set(compact('fornecedor', 'enderecos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fornecedor = $this->Fornecedors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fornecedor = $this->Fornecedors->patchEntity($fornecedor, $this->request->getData());
            if ($this->Fornecedors->save($fornecedor)) {
                $this->Flash->success(__('O Fornecedor foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Fornecedor não foi salvo. Por favor, tente novamente.'));
        }
        $enderecos = $this->Fornecedors->Enderecos->find('list', ['limit' => 200]);
        $this->set(compact('fornecedor', 'enderecos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fornecedor = $this->Fornecedors->get($id);
        if ($this->Fornecedors->delete($fornecedor)) {
            $this->Flash->success(__('O Fornecedor foi deletado.'));
        } else {
            $this->Flash->error(__('O Fornecedor não foi deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
