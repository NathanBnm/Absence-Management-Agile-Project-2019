'use strict';

document.addEventListener('DOMContentLoaded', function () {
    var tabs = document.getElementsByClassName('tabs');
    var istitle = document.getElementsByClassName("title");
    var issubmit = document.getElementById("submit");

    if (tabs) {
        var _loop = function _loop() {
            var tabListItems = tabs[i].querySelectorAll('li');
            tabListItems.forEach(function (tabListItem) {

                // création d'un écouteur d'évènements sur le clic d'une tab
                tabListItem.addEventListener('click', function () {

                    // suppression de la classe is-active sur chacune des tabs avant de la rajouter sur la tab qui a été cliquée
                    tabListItems.forEach(function (tabListItem) {
                        tabListItem.classList.remove('is-active');
                    });
                    tabListItem.classList.add('is-active');

                    // tabName correspond à la valeur de l'attribut data-tab
                    var tabName = tabListItem.dataset.tab;

                    if (tabName == 'etudiant') {
                        istitle[0].style.color = "#74b9ff";
                        issubmit.style.backgroundColor = "#74b9ff";
                        istitle[0].innerHTML = "Espace étudiant";
                        istitle[1].style.color = "#74b9ff";
                    }
                    else if (tabName == 'enseignant') {
                        istitle[0].style.color = "#fdcb6e";
                        istitle[0].innerHTML = "Espace enseignant";
                        istitle[1].style.color = "#fdcb6e";
                        issubmit.style.backgroundColor = "#fdcb6e";
                    }
                    else if (tabName == 'directeur') {
                        issubmit.style.backgroundColor = "#a29bfe";
                        istitle[0].style.color = "#a29bfe";
                        istitle[0].innerHTML = "Espace directeur des études";
                        istitle[1].style.color = "#a29bfe";
                    }

                    // on identifie tous les contenus possibles puis on applique la classe has-display-none si l'ID du contenu ne correspond pas à la valeur de l'attribut data-tab
                    tabListItem.closest('.js-tabs-container').querySelectorAll('.js-tab-content').forEach(function (tabContent) {

                        if (tabContent.id !== tabName) {
                            tabContent.classList.add('has-display-none');
                        } else {
                            tabContent.classList.remove('has-display-none');
                        }
                    });
                }, false);
            });
        };

        for (var i = 0; i < tabs.length; i++) {
            _loop();
        }
    }
});