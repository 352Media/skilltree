var userJsonUrl = 'http://localhost:8765/users/view/70363db3-80fb-449e-8b5f-1cc590a4bf9a.json';
var userSaveUrl = 'http://localhost:8765/users/view/70363db3-80fb-449e-8b5f-1cc590a4bf9a';

var skillTree = {
    availableSkills: {
        1: {
            name: 'First Skill',
            attributes: {
                1: 10
            }
        },
        2: {
            name: 'Second Skill',
            depends: 1,
            attributes: {
                1: 10,
                2: 5
            }
        },
        3: {
            name: 'Third Skill',
            depends: 1,
            attributes: {
                1: 5,
                2: 15
            }
        },
        4: {
            name: 'Fourth Skill',
            depends: 3,
            attributes: {
                3: 20
            }
        }
    },
    availableBadges: {
        1: {
            name: 'Beginner',
            skillDepends: [1]
        },
        2: {
            name: 'Ranking Up',
            skillDepends: [2,3]
        },
        3: {
            name: 'Mastery',
            skillDepends: [2,4]
        }
    },
    availableAttributes: {
        1: {
            name: 'Startery'
        },
        2: {
            name: 'Ace-ness'
        },
        3: {
            name: 'God-ness (Carl-ness)'
        }
    },
    character: {
        userId: 0,
        name: ko.observable('Your Name'),
        skills: {
            1: ko.observable(0),
            2: ko.observable(0),
            3: ko.observable(0),
            4: ko.observable(0)
        },
        badges: [1],
        stats: {
            1: ko.observable(0),
            2: ko.observable(0),
            3: ko.observable(0)
        },
        populateFromJson: function($json) {
            $.getJSON('/users/view/70363db3-80fb-449e-8b5f-1cc590a4bf9a.json', function(response) {
                userJson = response.user;
                skillTree.character.userId = userJson.id;
                skillTree.character.name = userJson.username;
                skillTree.character.skills = userJson.skills;
                skillTree.character.badges = userJson.badges;
                skillTree.character.stats = userJson.stats;
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
    }
}