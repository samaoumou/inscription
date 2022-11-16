(function () { // On utilise une IEF pour ne pas polluer l'espace global
  // Fonction de désactivation de l'aff des « tooltips »
  function deactivateTooltips() {
    var spans = document.getElementsByTagName('span'),
      spansLength = spans.length;
    for (var i = 0; i < spansLength; i++) {
      if (spans[i].className == 'tooltip') {
        spans[i].style.display = 'none';
      }
    }
  }
  // La fonction ci-dessous permet de récupérer la« tooltip » qui correspond à notre input
  function getTooltip(element) {
    while (element = element.nextSibling) {
      if (element.className === 'tooltip') {
        return element;
      }
    } return false;
  }
  // Fonctions de vérification du formulaire, ellesrenvoient « true » si tout est OK
  var check = {}; // On met toutes nos fonctions dans unobjet littéral

  check['lastName'] = function (id) {
    var name = document.getElementById(id),
      tooltipStyle = getTooltip(name).style;
    if (name.value.length >= 2) {
      name.className = 'correct';
      tooltipStyle.display = 'none';
      return true;
    } else {
      name.className = 'incorrect';
      tooltipStyle.display = 'inline-block';
      return false;
    }
  };
  check['firstName'] = check['lastName']; // La fonctionpour le prénom est la même que celle du nom

  check['email'] = function () {
    var login = document.getElementById('email').value,
      tooltipStyle = getTooltip(email).style;
    if (/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(login)) {
      login.className = 'correct';
      tooltipStyle.display = 'none';
      return true;
    } else {
      login.className = 'incorrect';
      tooltipStyle.display = 'inline-block';
      return false;
    }
  };



  /* pour le maus de passe */
  check['pwd1'] = function () {
    var pwd1 = document.getElementById('pwd1'),
      tooltipStyle = getTooltip(pwd1).style;
    if (pwd1.value.length >= 6) {
      pwd1.className = 'correct';
      tooltipStyle.display = 'none';
      return true;
    } else {
      pwd1.className = 'incorrect';
      tooltipStyle.display = 'inline-block';
      return false;
    }
  };
  check['pwd2'] = function () {
    var pwd1 = document.getElementById('pwd1'),
      pwd2 = document.getElementById('pwd2'),
      tooltipStyle = getTooltip(pwd2).style;
    if (pwd1.value == pwd2.value && pwd2.value != '') {
      pwd2.className = 'correct';
      tooltipStyle.display = 'none';
      return true;
    } else {
      pwd2.className = 'incorrect';
      tooltipStyle.display = 'inline-block';
      return false;
    }
  };



  check['country'] = function () {
    var country = document.getElementById('country'),
      tooltipStyle = getTooltip(country).style;
    if (country.options[country.selectedIndex].value !=
      'none') {
      tooltipStyle.display = 'none';
      return true;
    } else {
      tooltipStyle.display = 'inline-block';
      return false;
    }
  };

  // Mise en place des événements
  (function () { // Utilisation d'une fonction anonyme pour éviter les variables globales.
    var myForm = document.getElementById('myForm'),
      inputs = document.getElementsByTagName('input'),
      inputsLength = inputs.length;
    for (var i = 0; i < inputsLength; i++) {
      if (inputs[i].type == 'text' || inputs[i].type ==
        'password') {
        inputs[i].onkeyup = function () {
          check[this.id](this.id); // « this » représente l'input actuellement modifié
        };
      }
    }
    myForm.onsubmit = function () {
/*       var result = true;
      for (var i in check) {
        result = check[i](i) && result;
      }
      if (result) {
        alert('Le formulaire est bien rempli.');
      }
      return false;
    }; */
    myForm.onreset = function () {
      for (var i = 0; i < inputsLength; i++) {
        if (inputs[i].type == 'text' || inputs[i].type ==
          'password') {
          inputs[i].className = '';
        }
      }
      deactivateTooltips();
    };
  })();
  // Maintenant que tout est initialisé, on peutdésactiver les « tooltips »
  deactivateTooltips();
})();





/* var mail = document.getElementById("email").value;
var index = mail.indexOf("@");    
if(index === -1){
     alert("il manque @");
} */
var myImg = document.getElementById('myImg');
function anim() {
  var s = myImg.style,
    result = s.opacity = parseFloat(s.opacity) - 0.1;
  if (result > 0.2) {
    setTimeout(anim, 1000); // La fonction anim() fait appel à ellemême si elle n'a pas terminé son travail
  }
}
/* anim(); */
var myImg = document.getElementById('myImg');
function anim1() { /* changement de couleur */
  myImg.style = "auto";
}
window.onload;


function bigImg(x) {
  x.style.color = "white";
  x.style.background = "red"
}
function normalImg(x) { /* changement de couleur */
  x.style.color = "black";
  x.style.background = "white"
}
function bigImg1(x) {
  x.style.color = "white";
  x.style.background = "green"
}
function normalImg1(x) { /* changement de couleur */
  x.style.color = "black";
  x.style.background = "white"
}


