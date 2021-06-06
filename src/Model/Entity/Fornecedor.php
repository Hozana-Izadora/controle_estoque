<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fornecedor Entity
 *
 * @property int $id_fornecedor
 * @property string $fornecedor
 * @property int $endereco_id
 * @property string $contato
 * @property string $cnpj
 * @property string $numero_endereco
 * @property string $telefone
 * @property string $email
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Endereco $endereco
 * @property \App\Model\Entity\Produto[] $produtos
 */
class Fornecedor extends Entity
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
        'fornecedor' => true,
        'endereco_id' => true,
        'contato' => true,
        'cnpj' => true,
        'numero_endereco' => true,
        'telefone' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'endereco' => true,
        'produtos' => true,
    ];
}
