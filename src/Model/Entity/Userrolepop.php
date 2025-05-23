<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Userrolepop Entity
 *
 * @property int $id
 * @property string|null $ativo
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $user_id
 * @property int $role_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Role $role
 */
class Userrolepop extends Entity
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
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'role_id' => true,
        'user' => true,
        'role' => true,
    ];
}
