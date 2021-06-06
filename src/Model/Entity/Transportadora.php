<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transportadora Entity
 *
 * @property int $id_transportadora
 * @property int $endereco_id
 * @property string $transportadora
 * @property string $numero_endereco
 * @property string $cnpj
 * @property string $contato
 * @property string $telefone
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Endereco $endereco
 * @property \App\Model\Entity\Entrada[] $entradas
 * @property \App\Model\Entity\Saida[] $saidas
 */
class Transportadora extends Entity
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
        'transportadora' => true,
        'numero_endereco' => true,
        'cnpj' => true,
        'contato' => true,
        'telefone' => true,
        'created' => true,
        'modified' => true,
        'endereco' => true,
        'entradas' => true,
        'saidas' => true,
    ];
}
