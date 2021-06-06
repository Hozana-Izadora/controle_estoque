<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Endereco Entity
 *
 * @property int $id_endereco
 * @property string $logradouro
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 * @property string $cep
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Fornecedor[] $fornecedors
 * @property \App\Model\Entity\Loja[] $lojas
 * @property \App\Model\Entity\Transportadora[] $transportadoras
 */
class Endereco extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'logradouro' => true,
        'bairro' => true,
        'cidade' => true,
        'uf' => true,
        'cep' => true,
        'created' => true,
        'modified' => true,
        'fornecedors' => true,
        'lojas' => true,
        'transportadoras' => true,
    ];
}
