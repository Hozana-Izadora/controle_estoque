<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loja Entity
 *
 * @property int $id_loja
 * @property int $endereco_id
 * @property string $loja
 * @property string $telefone
 * @property string $contato
 * @property string $cnpj
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Endereco $endereco
 * @property \App\Model\Entity\Saida[] $saidas
 */
class Loja extends Entity
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
        'endereco_id' => true,
        'loja' => true,
        'telefone' => true,
        'contato' => true,
        'cnpj' => true,
        'created' => true,
        'modified' => true,
        'endereco' => true,
        'saidas' => true,
    ];
}
