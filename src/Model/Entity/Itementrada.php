<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Itementrada Entity
 *
 * @property int $id_itementrada
 * @property int $produto_id
 * @property int $entrada_id
 * @property string $lote
 * @property int $quantidade
 * @property float $valor
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Produto $produto
 * @property \App\Model\Entity\Entrada $entrada
 */
class Itementrada extends Entity
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
        'produto_id' => true,
        'entrada_id' => true,
        'lote' => true,
        'quantidade' => true,
        'valor' => true,
        'created' => true,
        'modified' => true,
        'produto' => true,
        'entrada' => true,
    ];
}
