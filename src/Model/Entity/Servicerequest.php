<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Servicerequest Entity
 *
 * @property int $id
 * @property string $imageFile
 * @property string $latitude
 * @property string $longitude
 * @property string|null $observacao
 * @property string|null $ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $service_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\User $user
 */
class Servicerequest extends Entity
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
        'imageFile' => true,
        'latitude' => true,
        'longitude' => true,
        'observacao' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'service_id' => true,
        'user_id' => true,
        'service' => true,
        'user' => true,
    ];
}
