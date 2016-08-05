<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SkillsTree Entity
 *
 * @property string $id
 * @property int $parent_id
 * @property int $lft
 * @property int $rght
 * @property int $skill_id
 *
 * @property \App\Model\Entity\ParentSkillsTree $parent_skills_tree
 * @property \App\Model\Entity\Skill $skill
 * @property \App\Model\Entity\ChildSkillsTree[] $child_skills_tree
 */
class SkillsTree extends Entity
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
