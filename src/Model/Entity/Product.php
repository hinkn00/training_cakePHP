<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $p_name
 * @property string $p_detail
 * @property int $p_price
 * @property string $p_image
 * @property int $p_status
 * @property \Cake\I18n\FrozenDate $created_at
 */
class Product extends Entity
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
        'p_name' => true,
        'p_detail' => true,
        'p_price' => true,
        'p_image' => true,
        'p_status' => true,
        'created_at' => true,
    ];
}
