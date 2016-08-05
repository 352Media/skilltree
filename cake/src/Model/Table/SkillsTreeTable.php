<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SkillsTree Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentSkillsTree
 * @property \Cake\ORM\Association\BelongsTo $Skills
 * @property \Cake\ORM\Association\HasMany $ChildSkillsTree
 *
 * @method \App\Model\Entity\SkillsTree get($primaryKey, $options = [])
 * @method \App\Model\Entity\SkillsTree newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SkillsTree[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SkillsTree|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SkillsTree patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SkillsTree[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SkillsTree findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class SkillsTreeTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('skills_tree');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('ParentSkillsTree', [
            'className' => 'SkillsTree',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Skills', [
            'foreignKey' => 'skill_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('ChildSkillsTree', [
            'className' => 'SkillsTree',
            'foreignKey' => 'parent_id'
        ]);
        $this->addBehavior('Tree', [
            'level' => 'level', // Defaults to null, i.e. no level saving
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name')
            ->notEmpty('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        //$rules->add($rules->existsIn(['parent_id'], 'ParentSkillsTree'));
        //$rules->add($rules->existsIn(['skill_id'], 'Skills'));

        return $rules;
    }
}
