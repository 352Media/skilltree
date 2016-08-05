<div>
    <?php echo $this->Html->script('jquery.min.js'); ?>
    <?php echo $this->Html->script('knockout.min.js'); ?>
    <?php echo $this->Html->script('app.js'); ?>
    <?php echo $this->Html->css('tree.css'); ?>
</div>
<div data-bind="text: character.name"></div>
<script>
$( document ).ready(function() {
    skillTree.character.populateFromJson();
    skillTree.populateFromJson();
    ko.applyBindings(skillTree);
    console.log(skillTree);
});
</script>
<script id="skillTemplate" type="text/html">
    <li class="skillNode">
        <div data-bind="text: name"></div>
        <!-- ko if: children.length > 0 -->
        <ul>
            <li data-bind="template: { name: 'skillTemplate', foreach: children }">
            </li>
        </ul>
        <!-- /ko -->
    </li>
</script>
<div class="tree">
    <ul>
        <li data-bind="template: { name: 'skillTemplate', foreach: skillTree.treeStructure }">
        </li>
    </ul>
</div>

