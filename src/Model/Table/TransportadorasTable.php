<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transportadoras Model
 *
 * @property \App\Model\Table\EnderecosTable&\Cake\ORM\Association\BelongsTo $Enderecos
 * @property \App\Model\Table\EntradasTable&\Cake\ORM\Association\HasMany $Entradas
 * @property \App\Model\Table\SaidasTable&\Cake\ORM\Association\HasMany $Saidas
 *
 * @method \App\Model\Entity\Transportadora newEmptyEntity()
 * @method \App\Model\Entity\Transportadora newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Transportadora[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transportadora get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transportadora findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Transportadora patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transportadora[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transportadora|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transportadora saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transportadora[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transportadora[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transportadora[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Transportadora[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransportadorasTable extends Table
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

        $this->setTable('transportadoras');
        $this->setDisplayField('transportadora');
        $this->setPrimaryKey('id_transportadora');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Enderecos', [
            'foreignKey' => 'endereco_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Entradas', [
            'foreignKey' => 'transportadora_id',
        ]);
        $this->hasMany('Saidas', [
            'foreignKey' => 'transportadora_id',
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
            ->integer('id_transportadora')
            ->allowEmptyString('id_transportadora', null, 'create');

        $validator
            ->scalar('transportadora')
            ->maxLength('transportadora', 200)
            ->requirePresence('transportadora', 'create')
            ->notEmptyString('transportadora');

        $validator
            ->scalar('numero_endereco')
            ->maxLength('numero_endereco', 20)
            ->requirePresence('numero_endereco', 'create')
            ->notEmptyString('numero_endereco');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 20)
            ->requirePresence('cnpj', 'create')
            ->notEmptyString('cnpj');

        $validator
            ->scalar('contato')
            ->maxLength('contato', 100)
            ->requirePresence('contato', 'create')
            ->notEmptyString('contato');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 20)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

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
