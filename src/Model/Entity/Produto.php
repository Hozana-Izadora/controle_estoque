<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id_produto
 * @property int $categoria_id
 * @property int $fornecedor_id
 * @property string $produto
 * @property int $quantidade
 * @property int $quantidade_minima
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Fornecedor $fornecedor
 * @property \App\Model\Entity\Itementrada[] $itementradas
 * @property \App\Model\Entity\Itemsaida[] $itemsaidas
 */
class Produto extends Entity
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
        'categoria_id' => true,
        'fornecedor_id' => true,
        'produto' => true,
        'quantidade' => true,
        'quantidade_minima' => true,
        'created' => true,
        'modified' => true,
        'categoria' => true,
        'fornecedor' => true,
        'itementradas' => true,
        'itemsaidas' => true,
    ];
}
