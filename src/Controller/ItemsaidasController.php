<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Itemsaidas Controller
 *
 * @property \App\Model\Table\ItemsaidasTable $Itemsaidas
 * @method \App\Model\Entity\Itemsaida[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsaidasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Saidas', 'Produtos'],
        ];
        $itemsaidas = $this->paginate($this->Itemsaidas);

        $this->set(compact('itemsaidas'));
    }

    /**
     * View method
     *
     * @param string|null $id Itemsaida id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemsaida = $this->Itemsaidas->get($id, [
            'contain' => ['Saidas', 'Produtos'],
        ]);

        $this->set(compact('itemsaida'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemsaida = $this->Itemsaidas->newEmptyEntity();
        if ($this->request->is('post')) {
            $itemsaida = $this->Itemsaidas->patchEntity($itemsaida, $this->request->getData());
            if ($this->Itemsaidas->save($itemsaida)) {
                $this->Flash->success(__('The itemsaida has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itemsaida could not be saved. Please, try again.'));
        }
        $saidas = $this->Itemsaidas->Saidas->find('list', ['limit' => 200]);
        $produtos = $this->Itemsaidas->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('itemsaida', 'saidas', 'produtos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Itemsaida id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemsaida = $this->Itemsaidas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemsaida = $this->Itemsaidas->patchEntity($itemsaida, $this->request->getData());
            if ($this->Itemsaidas->save($itemsaida)) {
                $this->Flash->success(__('The itemsaida has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itemsaida could not be saved. Please, try again.'));
        }
        $saidas = $this->Itemsaidas->Saidas->find('list', ['limit' => 200]);
        $produtos = $this->Itemsaidas->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('itemsaida', 'saidas', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Itemsaida id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemsaida = $this->Itemsaidas->get($id);
        if ($this->Itemsaidas->delete($itemsaida)) {
            $this->Flash->success(__('The itemsaida has been deleted.'));
        } else {
            $this->Flash->error(__('The itemsaida could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
