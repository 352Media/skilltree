<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stats Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Skills
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Stat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stat findOrCreate($search, callable $callback = null)
 */
class StatsTable extends Table
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

        $this->table('stats');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsToMany('Skills', [
            'foreignKey' => 'stat_id',
            'targetForeignKey' => 'skill_id',
            'joinTable' => 'skills_stats'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'stat_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_stats'
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
            ->allowEmpty('title');

        return $validator;
    }
}
