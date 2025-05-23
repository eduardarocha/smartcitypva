<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $definicao
 * @property string $imageFile
 * @property string $descricao
 * @property string $mensagem
 * @property string|null $ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Servicerequest[] $servicerequests
 */
class Service extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nome' => true,
        'definicao' => true,
        'imageFile' => true,
        'descricao' => true,
        'mensagem' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'servicerequests' => true,
    ];
}
