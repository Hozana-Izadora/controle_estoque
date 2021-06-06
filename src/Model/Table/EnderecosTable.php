<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enderecos Model
 *
 * @property \App\Model\Table\FornecedorsTable&\Cake\ORM\Association\HasMany $Fornecedors
 * @property \App\Model\Table\LojasTable&\Cake\ORM\Association\HasMany $Lojas
 * @property \App\Model\Table\TransportadorasTable&\Cake\ORM\Association\HasMany $Transportadoras
 *
 * @method \App\Model\Entity\Endereco newEmptyEntity()
 * @method \App\Model\Entity\Endereco newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Endereco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Endereco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Endereco findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Endereco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Endereco[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Endereco|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Endereco saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Endereco[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Endereco[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Endereco[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Endereco[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EnderecosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('enderecos');
        $this->setDisplayField('id_endereco');
        $this->setPrimaryKey('id_endereco');

        $this->addBehavior('Timestamp');

        $this->hasMany('Fornecedors', [
            'foreignKey' => 'endereco_id',
        ]);
        $this->hasMany('Lojas', [
            'foreignKey' => 'endereco_id',
        ]);
        $this->hasMany('Transportadoras', [
            'foreignKey' => 'endereco_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id_endereco')
            ->allowEmptyString('id_endereco', null, 'create');

        $validator
            ->scalar('logradouro')
            ->maxLength('logradouro', 200)
            ->requirePresence('logradouro', 'create')
            ->notEmptyString('logradouro');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 50)
            ->requirePresence('bairro', 'create')
            ->notEmptyString('bairro');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 50)
            ->requirePresence('cidade', 'create')
            ->notEmptyString('cidade');

        $validator
            ->scalar('uf')
            ->maxLength('uf', 2)
            ->requirePresence('uf', 'create')
            ->notEmptyString('uf');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 10)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep');

        return $validator;
    }
}
