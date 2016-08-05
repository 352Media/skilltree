var userJsonUrl = '/users/view/';
var skillJsonUrl = '/skills.json';
var skillTreeJsonUrl = '/skills-tree/listTree.json';

var skillTree = {
    availableSkills: ko.observable(),
    treeStructure: ko.observable(),
    userId: '70363db3-80fb-449e-8b5f-1cc590a4bf9a',
    character: {
        userId: ko.observable(0),
        name: ko.observable('Your Name'),
        skills: ko.observable({
            1: 0,
            2: 0,
            3: 0,
            4: 0
        }),
        badges: ko.observable([1]),
        stats: ko.observable({
            1: 0,
            2: 0,
            3: 0
        }),
        populateFromJson: function() {
            $.getJSON(userJsonUrl + skillTree.userId + '.json', function(response) {
                userJson = response.user;
                skillTree.character.userId(userJson.id);
                skillTree.character.name(userJson.username);
                skillTree.character.skills(userJson.skills);
                skillTree.character.badges(userJson.badges);
                skillTree.character.stats(userJson.stats);
            });
        },
        saveUser: function() {
            var dataString = '?id=' + this.userId + '&name=' + this.name;
            for (prop in this.skills) {
                dataString += prop + '=' + this.skills[prop] + '&';
            }
            $.ajax({
                type:'POST',
                data:dataString,
                url:userSaveUrl
            });
        }
    },
    populateFromJson: function() {
        $.getJSON(skillJsonUrl, function(response) {
            var skillsList = new Object;
            skillsJson = response.skills;
            for (skillId in skillsJson) {
                skillsList[skillsJson[skillId].id] = skillsJson[skillId];
            }
            skillTree.availableSkills(skillsList);
        });

        $.getJSON(skillTreeJsonUrl, function(response) {
            var skillsTree = new Object;
            skillsTree = response.skillsTree;
            skillTree.treeStructure(skillsTree);
        });
    },
    addRank: function(id) {
        if (typeof skillTree.character.skills()[id] === "undefined") {
            skillTree.character.skills()[id] = 0;
        }
        skillTree.character.skills()[id]++;
    },
    removeRank: function(id) {
        if (typeof skillTree.character.skills()[id] != "undefined" && typeof skillTree.character.skills()[id] != 0) {
            skillTree.character.skills()[id]--;
        }
    }
}