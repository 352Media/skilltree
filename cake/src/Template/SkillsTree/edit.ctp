<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $skillsTree->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $skillsTree->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Nodes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Skills Tree'), ['controller' => 'SkillsTree', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Skills Tree'), ['controller' => 'SkillsTree', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="skillsTree form large-9 medium-8 columns content">
    <?= $this->Form->create($skillsTree) ?>
    <fieldset>
        <legend><?= __('Edit Skills Tree') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentSkillsTree, 'empty' => true]);
            echo $this->Form->input('skill_id', ['empty' => __("Pick a skill..."), 'options' => $skills]);
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
