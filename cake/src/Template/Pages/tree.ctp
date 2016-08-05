<div>
    <?php echo $this->Html->script('jquery.min.js'); ?>
    <?php echo $this->Html->script('knockout.min.js'); ?>
    <?php echo $this->Html->script('app.js'); ?>
</div>
<div data-bind="text: character.name"></div>
<script>
skillTree.character.populateFromJson();
skillTree.populateFromJson();
ko.applyBindings(skillTree);
</script>
