<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Itemsaidas Model
 *
 * @property \App\Model\Table\SaidasTable&\Cake\ORM\Association\BelongsTo $Saidas
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsTo $Produtos
 *
 * @method \App\Model\Entity\Itemsaida newEmptyEntity()
 * @method \App\Model\Entity\Itemsaida newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Itemsaida[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Itemsaida get($primaryKey, $options = [])
 * @method \App\Model\Entity\Itemsaida findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Itemsaida patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Itemsaida[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Itemsaida|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Itemsaida saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Itemsaida[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Itemsaida[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Itemsaida[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Itemsaida[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItemsaidasTable extends Table
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

        $this->setTable('itemsaidas');
        $this->setDisplayField('id_itemsaida');
        $this->setPrimaryKey('id_itemsaida');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Saidas', [
            'foreignKey' => 'saida_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id',
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
            ->integer('id_itemsaida')
            ->allowEmptyString('id_itemsaida', null, 'create');

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
        $rules->add($rules->existsIn(['saida_id'], 'Saidas'), ['errorField' => 'saida_id']);
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'), ['errorField' => 'produto_id']);

        return $rules;
    }
}
