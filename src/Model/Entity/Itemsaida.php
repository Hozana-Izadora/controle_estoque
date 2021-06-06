<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Itemsaida Entity
 *
 * @property int $id_itemsaida
 * @property int $saida_id
 * @property int $produto_id
 * @property string $lote
 * @property int $quantidade
 * @property float $valor
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Saida $saida
 * @property \App\Model\Entity\Produto $produto
 */
class Itemsaida extends Entity
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
        'saida_id' => true,
        'produto_id' => true,
        'lote' => true,
        'quantidade' => true,
        'valor' => true,
        'created' => true,
        'modified' => true,
        'saida' => true,
        'produto' => true,
    ];
}
