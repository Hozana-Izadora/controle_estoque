<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entrada Entity
 *
 * @property int $id_entrada
 * @property int $transportadora_id
 * @property \Cake\I18n\FrozenDate $data_pedido
 * @property \Cake\I18n\FrozenDate $data_entrada
 * @property float $total
 * @property int $numero_nf
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Transportadora $transportadora
 * @property \App\Model\Entity\Itementrada[] $itementradas
 */
class Entrada extends Entity
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
        'transportadora_id' => true,
        'data_pedido' => true,
        'data_entrada' => true,
        'total' => true,
        'numero_nf' => true,
        'created' => true,
        'modified' => true,
        'transportadora' => true,
        'itementradas' => true,
    ];
}
