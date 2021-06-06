<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fornecedors Model
 *
 * @property \App\Model\Table\EnderecosTable&\Cake\ORM\Association\BelongsTo $Enderecos
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\HasMany $Produtos
 *
 * @method \App\Model\Entity\Fornecedor newEmptyEntity()
 * @method \App\Model\Entity\Fornecedor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fornecedor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fornecedor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fornecedor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fornecedor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fornecedor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FornecedorsTable extends Table
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

        $this->setTable('fornecedors');
        $this->setDisplayField('id_fornecedor');
        $this->setPrimaryKey('id_fornecedor');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Enderecos', [
            'foreignKey' => 'endereco_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Produtos', [
            'foreignKey' => 'fornecedor_id',
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
            ->integer('id_fornecedor')
            ->allowEmptyString('id_fornecedor', null, 'create');

        $validator
            ->scalar('fornecedor')
            ->maxLength('fornecedor', 200)
            ->requirePresence('fornecedor', 'create')
            ->notEmptyString('fornecedor');

        $validator
            ->scalar('contato')
            ->maxLength('contato', 100)
            ->requirePresence('contato', 'create')
            ->notEmptyString('contato');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 20)
            ->requirePresence('cnpj', 'create')
            ->notEmptyString('cnpj');

        $validator
            ->scalar('numero_endereco')
            ->maxLength('numero_endereco', 15)
            ->requirePresence('numero_endereco', 'create')
            ->notEmptyString('numero_endereco');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 15)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['endereco_id'], 'Enderecos'), ['errorField' => 'endereco_id']);

        return $rules;
    }
}
