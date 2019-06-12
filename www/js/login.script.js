document.addEventListener('DOMContentLoaded', function () {
    var tabs = document.getElementsByClassName('tabs');
    var istitle = document.getElementsByClassName('title');
    var issubmit = document.getElementById('submit');

    if (tabs) {
        var loop = function loop() {
            var tabListItems = tabs[i].querySelectorAll('li');
            tabListItems.forEach(function (tabListItem) {

                //Création d'un écouteur d'évènements sur le clic d'un onglet
                tabListItem.addEventListener('click', function () {

                    //Suppression de la classe is-active sur chacun des onglets avant de la rajouter sur celui qui a été cliqué
                    tabListItems.forEach(function (tabListItem) {
                        tabListItem.classList.remove('is-active');
                    });
                    tabListItem.classList.add('is-active');

                    //La variable tabName correspond à la valeur de l'attribut data-tab
                    var tabName = tabListItem.dataset.tab;

                    istitle[0].classList.remove('bleu');
                    istitle[0].classList.remove('orange');
                    istitle[0].classList.remove('violet');
                    istitle[1].classList.remove('bleu');
                    istitle[1].classList.remove('orange');
                    istitle[1].classList.remove('violet');
                    issubmit.classList.remove('bg-bleu');
                    issubmit.classList.remove('bg-orange');
                    issubmit.classList.remove('bg-violet');

                    if (tabName == 'etudiant') {
                        istitle[0].classList.add('bleu');
                        istitle[0].innerHTML = "Espace étudiant";
                        istitle[1].classList.add('bleu');
                        issubmit.classList.add('bg-bleu');
                    }
                    else if (tabName == 'enseignant') {
                        istitle[0].classList.add('orange');
                        istitle[0].innerHTML = "Espace enseignant";
                        istitle[1].classList.add('orange');
                        issubmit.classList.add('bg-orange');
                    }
                    else if (tabName == 'directeur') {
                        istitle[0].classList.add('violet');
                        istitle[0].innerHTML = "Espace directeur des études";
                        istitle[1].classList.add('violet');
                        issubmit.classList.add('bg-violet');
                    }

                }, false);
            });
        };

        for (var i = 0; i < tabs.length; i++) {
            loop();
        }
    }
});