<div>
    <?php echo $this->Html->script('jquery.min.js'); ?>
    <?php echo $this->Html->script('knockout.min.js'); ?>
    <?php echo $this->Html->script('app.js'); ?>
</div>
<div data-bind="text: character.name"></div>
<script>
ko.applyBindings(skillTree);
skillTree.character.populateFromJson();
</script>
