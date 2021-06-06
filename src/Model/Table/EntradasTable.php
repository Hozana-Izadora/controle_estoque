<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Entradas Model
 *
 * @property \App\Model\Table\TransportadorasTable&\Cake\ORM\Association\BelongsTo $Transportadoras
 * @property \App\Model\Table\ItementradasTable&\Cake\ORM\Association\HasMany $Itementradas
 *
 * @method \App\Model\Entity\Entrada newEmptyEntity()
 * @method \App\Model\Entity\Entrada newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Entrada[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Entrada get($primaryKey, $options = [])
 * @method \App\Model\Entity\Entrada findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Entrada patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Entrada[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Entrada|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entrada saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entrada[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Entrada[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Entrada[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Entrada[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EntradasTable extends Table
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

        $this->setTable('entradas');
        $this->setDisplayField('id_entrada');
        $this->setPrimaryKey('id_entrada');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Transportadoras', [
            'foreignKey' => 'transportadora_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Itementradas', [
            'foreignKey' => 'entrada_id',
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
            ->integer('id_entrada')
            ->allowEmptyString('id_entrada', null, 'create');

        $validator
            ->date('data_pedido')
            ->requirePresence('data_pedido', 'create')
            ->notEmptyDate('data_pedido');

        $validator
            ->date('data_entrada')
            ->requirePresence('data_entrada', 'create')
            ->notEmptyDate('data_entrada');

        $validator
            ->numeric('total')
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

        $validator
            ->integer('numero_nf')
            ->requirePresence('numero_nf', 'create')
            ->notEmptyString('numero_nf');

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
        $rules->add($rules->existsIn(['transportadora_id'], 'Transportadoras'), ['errorField' => 'transportadora_id']);

        return $rules;
    }
}
