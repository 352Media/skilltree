<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Skills Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Talents
 * @property \Cake\ORM\Association\HasMany $Links
 * @property \Cake\ORM\Association\HasMany $Ranks
 * @property \Cake\ORM\Association\HasMany $SkillsTree
 * @property \Cake\ORM\Association\BelongsToMany $Stats
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Skill get($primaryKey, $options = [])
 * @method \App\Model\Entity\Skill newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Skill[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Skill|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Skill patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Skill[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Skill findOrCreate($search, callable $callback = null)
 */
class SkillsTable extends Table
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

        $this->table('skills');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsTo('Talents', [
            'foreignKey' => 'talent_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('Links', [
            'foreignKey' => 'skill_id'
        ]);
        $this->hasMany('Ranks', [
            'foreignKey' => 'skill_id'
        ]);
        $this->hasMany('SkillsTree', [
            'foreignKey' => 'skill_id'
        ]);
        $this->belongsToMany('Stats', [
            'foreignKey' => 'skill_id',
            'targetForeignKey' => 'stat_id',
            'joinTable' => 'skills_stats'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'skill_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_skills'
        ]);
        // $this->addBehavior('CounterCache', [
        //     'Ranks' => ['rank_count']
        // ]);
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

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
        $rules->add($rules->existsIn(['talent_id'], 'Talents'));

        return $rules;
    }
}
