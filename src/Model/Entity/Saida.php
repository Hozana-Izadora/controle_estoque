<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Saida Entity
 *
 * @property int $id_saida
 * @property int $loja_id
 * @property int $transportadora_id
 * @property float $total
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Loja $loja
 * @property \App\Model\Entity\Transportadora $transportadora
 * @property \App\Model\Entity\Itemsaida[] $itemsaidas
 */
class Saida extends Entity
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
        'loja_id' => true,
        'transportadora_id' => true,
        'total' => true,
        'created' => true,
        'modified' => true,
        'loja' => true,
        'transportadora' => true,
        'itemsaidas' => true,
    ];
}
