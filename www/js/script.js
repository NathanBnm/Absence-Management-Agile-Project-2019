var refs = {
    Recap_semestre: {
        open: function () {
            document.getElementById('Recap_semestre').classList.add('is-active');
        },
        close: function () {
            document.getElementById('Recap_semestre').classList.remove('is-active');

        }
    }
};

var refs1 = {
    Recap_module: {
        open: function () {
            document.getElementById('Recap_module').classList.add('is-active');
        },
        close: function () {
            document.getElementById('Recap_module').classList.remove('is-active');

        }
    }
};

var refs2 = {
    Recap_enseignant: {
        open: function () {
            document.getElementById('Recap_enseignant').classList.add('is-active');
        },
        close: function () {
            document.getElementById('Recap_enseignant').classList.remove('is-active');

        }
    }
};

var rtd = {
    Modif_retard: {
        open: function () {
            document.getElementById('Modif_retard').classList.add('is-active');
        },
        close: function () {
            document.getElementById('Modif_retard').classList.remove('is-active');

        }
    }
};


var abs = {
    Modif_absence: {
        open: function () {
            document.getElementById('Modif_absence').classList.add('is-active');
        },
        close: function () {
            document.getElementById('Modif_absence').classList.remove('is-active');

        }
    }
};

var m1 = {
    m1_acc: {
        open: function () {
            document.getElementById('m1_acc').classList.add('is-active');
        },
        close: function () {
            document.getElementById('m1_acc').classList.remove('is-active');

        }
    }
};

var michel = {
    Consultation: {
        open: function () {
            document.getElementById('Consultation').classList.add('is-active');
        },
        close: function () {
            document.getElementById('Consultation').classList.remove('is-active');

        }
    }
};

var michel2 = {
    information: {
        open: function () {
            document.getElementById('information').classList.add('is-active');
        },
        close: function () {
            document.getElementById('information').classList.remove('is-active');

        }
    }
};

function sauvegarder(){
    var mod = document.getElementById("module").value;
    var typecours = document.getElementById("typecourse").value;
    var controle = document.getElementById("controle").value;
    var day = document.getElementById("day").value;
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;
    var time = document.getElementById("time").value;
    var type = document.getElementById("type").value;
    var etudiant = document.getElementById("etupass").value;
    var message = document.getElementById("message").value;
    setTimeOut(remplir,1000,mod,typecours,controle,day,month,year,time,type,etudiant,message);
    return false;
}

function remplir(mod,typecours,controle,day,month,year,time,type,etudiant,message){
    document.getElementById("module").value = mod;
    document.getElementById("typecourse").value = typecours;
    document.getElementById("controle").value = controle;
    document.getElementById("day").value = day;
    document.getElementById("month").value = month;
    document.getElementById("year").value = year;
    document.getElementById("time").value = time;
    document.getElementById("type").value = type;
    document.getElementById("etupass").value = etudiant;
    document.getElementById("message").value = message;
}

