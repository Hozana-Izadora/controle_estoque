<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lojas Model
 *
 * @property \App\Model\Table\EnderecosTable&\Cake\ORM\Association\BelongsTo $Enderecos
 * @property \App\Model\Table\SaidasTable&\Cake\ORM\Association\HasMany $Saidas
 *
 * @method \App\Model\Entity\Loja newEmptyEntity()
 * @method \App\Model\Entity\Loja newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Loja[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Loja get($primaryKey, $options = [])
 * @method \App\Model\Entity\Loja findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Loja patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Loja[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Loja|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loja saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Loja[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Loja[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Loja[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Loja[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LojasTable extends Table
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

        $this->setTable('lojas');
        $this->setDisplayField('id_loja');
        $this->setPrimaryKey('id_loja');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Enderecos', [
            'foreignKey' => 'endereco_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Saidas', [
            'foreignKey' => 'loja_id',
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
            ->integer('id_loja')
            ->allowEmptyString('id_loja', null, 'create');

        $validator
            ->scalar('loja')
            ->maxLength('loja', 200)
            ->requirePresence('loja', 'create')
            ->notEmptyString('loja');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 20)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->scalar('contato')
            ->maxLength('contato', 50)
            ->requirePresence('contato', 'create')
            ->notEmptyString('contato');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 20)
            ->requirePresence('cnpj', 'create')
            ->notEmptyString('cnpj');

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
