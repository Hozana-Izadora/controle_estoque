<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Saidas Model
 *
 * @property \App\Model\Table\LojasTable&\Cake\ORM\Association\BelongsTo $Lojas
 * @property \App\Model\Table\TransportadorasTable&\Cake\ORM\Association\BelongsTo $Transportadoras
 * @property \App\Model\Table\ItemsaidasTable&\Cake\ORM\Association\HasMany $Itemsaidas
 *
 * @method \App\Model\Entity\Saida newEmptyEntity()
 * @method \App\Model\Entity\Saida newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Saida[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Saida get($primaryKey, $options = [])
 * @method \App\Model\Entity\Saida findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Saida patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Saida[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Saida|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Saida saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Saida[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Saida[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Saida[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Saida[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SaidasTable extends Table
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

        $this->setTable('saidas');
        $this->setDisplayField('id_saida');
        $this->setPrimaryKey('id_saida');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Lojas', [
            'foreignKey' => 'loja_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Transportadoras', [
            'foreignKey' => 'transportadora_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Itemsaidas', [
            'foreignKey' => 'saida_id',
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
            ->integer('id_saida')
            ->allowEmptyString('id_saida', null, 'create');

        $validator
            ->numeric('total')
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

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
        $rules->add($rules->existsIn(['loja_id'], 'Lojas'), ['errorField' => 'loja_id']);
        $rules->add($rules->existsIn(['transportadora_id'], 'Transportadoras'), ['errorField' => 'transportadora_id']);

        return $rules;
    }
}
