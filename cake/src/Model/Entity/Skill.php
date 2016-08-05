<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Skill Entity
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $talent_id
 *
 * @property \App\Model\Entity\Talent $talent
 * @property \App\Model\Entity\Link[] $links
 * @property \App\Model\Entity\Rank[] $ranks
 * @property \App\Model\Entity\SkillsTree[] $skills_tree
 * @property \App\Model\Entity\Stat[] $stats
 * @property \App\Model\Entity\User[] $users
 */
class Skill extends Entity
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
        '*' => true,
        'id' => false
    ];
}
