<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Node'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="skillsTree index large-9 medium-8 columns content">
    <h3><?= __('Skills Tree') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('skill_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($skillsTree as $skillsTree): ?>
            <tr>
                <td><?= $skillsTree->has('parent_skills_tree') ? $this->Html->link($skillsTree->parent_skills_tree->name, ['controller' => 'SkillsTree', 'action' => 'view', $skillsTree->parent_skills_tree->id]) : '' ?></td>
                <td><?= $skillsTree->has('skill') ? $this->Html->link($skillsTree->skill->title, ['controller' => 'Skills', 'action' => 'view', $skillsTree->skill->id]) : '' ?></td>
                <td><?= h($skillsTree->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $skillsTree->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skillsTree->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skillsTree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillsTree->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
