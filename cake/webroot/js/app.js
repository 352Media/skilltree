var skillTree = {
    available_skills: {
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
                1: 10
                2: 5
            }
        },
        3: {
            name: 'Third Skill',
            depends: 1,
            attributes: {
                1: 5
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
    available_badges: {
        1: {
            name: 'Beginner',
            skill_depends: [1]
        },
        2: {
            name: 'Ranking Up',
            skill_depends: [2,3]
        },
        3: {
            name: 'Mastery',
            skill_depends: [2,4]
        }
    },
    available_attributes: {
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
        name: ko.observable('Your Name'),
        skills: {
            1: ko.observable(0),
            2: ko.observable(0),
            3: ko.observable(0),
            4: ko.observable(0)
        },
        badges: [1],
        attributes: {
            1: ko.observable(0),
            2: ko.observable(0),
            3: ko.observable(0)
        }
    }
}

ko.applyBindings(skillTree);