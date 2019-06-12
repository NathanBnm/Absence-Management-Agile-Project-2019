function openTab(evt, tabName) {
    var i, tablinks;
    let istitle = document.getElementsByClassName("title");
    let issubmit = document.getElementById("submit");
    tablinks = document.getElementsByClassName("tab");

    for (i = 0; i <3; i++) {
        tablinks[i].className = tablinks[i].className.replace(" is-active", "");
    }
    if (tabName == 'Etudiant'){
        istitle[0].style.color = "hsl(204, 86%, 53%)";
        issubmit.style.backgroundColor = "hsl(217, 71%, 53%)";
    }
    else if (tabName == 'Professeur'){
        istitle[0].style.color = "hsl(24,85%,55%)";
        issubmit.style.backgroundColor = "hsl(20,91%,45%)";
    }
    else {
        istitle[0].style.color = "hsl(294,90%,50%)";
        issubmit.style.backgroundColor = "hsl(293,100%,43%)";
    }
    evt.currentTarget.className += " is-active";
}