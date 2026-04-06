// Recuperation des champs de formulaire
const emailInputNewseletter = document.getElementById("add-newseletter-email");
const frmAddNewsletter = document.getElementById("addNewseletterForm");
const btnSubmitNews = frmAddNewsletter.querySelector("button[type='submit']");


let isEmailValidNews = false;

// Desactive le boutton de soumission par defaut
btnSubmitNews.disabled = true;

// Permet d'affiche ou masquer les message d'eureur
function showError(input, message)
{
    const baliseP = input.nextElementSibling;
    if (message) {
        baliseP.textContent = message;
        input.classList.add("is-invalid");
        baliseP.style.color = "brown";
        baliseP.style.fontWeight = "bold";
    }
    else
    {
        baliseP.textContent = "";
        input.classList.remove("is-invalid");
    }
}

// Active le bouton de valdation si les deux champs est valide
function checkFormValidity()
{
    btnSubmitNews.disabled = !(isEmailValidNews);
}

// Validation du champ email a la saisie
emailInputNewseletter.addEventListener("input", () => {
        const email = emailInputNewseletter.value.trim();
        const emailValidator = Validator.emailValidator("L'email", email);

        if (emailValidator) {
            showError(emailInputNewseletter, emailValidator.message);
            isEmailValidNews = false;
        }
        else
        {
            showError(emailInputNewseletter, "");
            isEmailValidNews = true;
        }
        checkFormValidity();
    }
);