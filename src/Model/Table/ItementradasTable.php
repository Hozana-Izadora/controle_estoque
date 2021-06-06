<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Itementradas Model
 *
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsTo $Produtos
 * @property \App\Model\Table\EntradasTable&\Cake\ORM\Association\BelongsTo $Entradas
 *
 * @method \App\Model\Entity\Itementrada newEmptyEntity()
 * @method \App\Model\Entity\Itementrada newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Itementrada[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Itementrada get($primaryKey, $options = [])
 * @method \App\Model\Entity\Itementrada findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Itementrada patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Itementrada[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Itementrada|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Itementrada saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Itementrada[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Itementrada[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Itementrada[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Itementrada[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItementradasTable extends Table
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

        $this->setTable('itementradas');
        $this->setDisplayField('id_itementrada');
        $this->setPrimaryKey('id_itementrada');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Entradas', [
            'foreignKey' => 'entrada_id',
            'joinType' => 'INNER',
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
            ->integer('id_itementrada')
            ->allowEmptyString('id_itementrada', null, 'create');

        $validator
            ->scalar('lote')
            ->maxLength('lote', 100)
            ->requirePresence('lote', 'create')
            ->notEmptyString('lote');

        $validator
            ->integer('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmptyString('quantidade');

        $validator
            ->numeric('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

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
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'), ['errorField' => 'produto_id']);
        $rules->add($rules->existsIn(['entrada_id'], 'Entradas'), ['errorField' => 'entrada_id']);

        return $rules;
    }
}
