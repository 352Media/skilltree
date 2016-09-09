<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skill'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Talents'), ['controller' => 'Talents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Talent'), ['controller' => 'Talents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Links'), ['controller' => 'Links', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Link'), ['controller' => 'Links', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ranks'), ['controller' => 'Ranks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rank'), ['controller' => 'Ranks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nodes'), ['controller' => 'SkillsTree', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Node'), ['controller' => 'SkillsTree', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stats'), ['controller' => 'Stats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stat'), ['controller' => 'Stats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="skills view large-9 medium-8 columns content">
    <h3><?= h($skill->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($skill->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($skill->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Talent') ?></th>
            <td><?= $skill->has('talent') ? $this->Html->link($skill->talent->name, ['controller' => 'Talents', 'action' => 'view', $skill->talent->id]) : '' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($skill->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Links') ?></h4>
        <?php if (!empty($skill->links)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Label') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Skill Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->links as $links): ?>
            <tr>
                <td><?= h($links->id) ?></td>
                <td><?= h($links->label) ?></td>
                <td><?= h($links->url) ?></td>
                <td><?= h($links->skill_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Links', 'action' => 'view', $links->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Links', 'action' => 'edit', $links->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Links', 'action' => 'delete', $links->id], ['confirm' => __('Are you sure you want to delete # {0}?', $links->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ranks') ?></h4>
        <?php if (!empty($skill->ranks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Skill Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->ranks as $ranks): ?>
            <tr>
                <td><?= h($ranks->id) ?></td>
                <td><?= h($ranks->description) ?></td>
                <td><?= h($ranks->skill_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ranks', 'action' => 'view', $ranks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ranks', 'action' => 'edit', $ranks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ranks', 'action' => 'delete', $ranks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ranks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Skills Tree') ?></h4>
        <?php if (!empty($skill->skills_tree)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Skill Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->skills_tree as $skillsTree): ?>
            <tr>
                <td><?= h($skillsTree->id) ?></td>
                <td><?= h($skillsTree->parent_id) ?></td>
                <td><?= h($skillsTree->lft) ?></td>
                <td><?= h($skillsTree->rght) ?></td>
                <td><?= h($skillsTree->skill_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SkillsTree', 'action' => 'view', $skillsTree->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SkillsTree', 'action' => 'edit', $skillsTree->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SkillsTree', 'action' => 'delete', $skillsTree->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skillsTree->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stats') ?></h4>
        <?php if (!empty($skill->stats)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->stats as $stats): ?>
            <tr>
                <td><?= h($stats->id) ?></td>
                <td><?= h($stats->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Stats', 'action' => 'view', $stats->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stats', 'action' => 'edit', $stats->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stats', 'action' => 'delete', $stats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stats->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($skill->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Password') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="image">
        <h4><?= __('Image') ?></h4>
        <?php echo $this->Html->image('../files/skills/photo/' . $skill->get('photo_dir') . '/' . $skill->get('photo')); ?>
    </div>
</div>
