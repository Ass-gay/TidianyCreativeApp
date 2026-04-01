// Recuperation des champs de formulaire
const nomInput = document.getElementById("nom");
const descriptionInput = document.getElementById("description");
const photoInput = document.getElementById("photo");
const typeInput = document.getElementById("type");
const frmAddRealisation = document.getElementById("addRealisationForm");
const btnSubmit = frmAddRealisation.querySelector("button[type='submit']");

let isNameValid = false;
let isDescriptionValid = false;
let isPhotoValid = false;
let isTypeValid = false;

// Desactive le boutton de soumission par defaut
btnSubmit.disabled = true;

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
    btnSubmit.disabled = !(isNameValid && isDescriptionValid && isPhotoValid && isTypeValid);
}

// Validation du champ nom a la saisie
nomInput.addEventListener("input", () => {
        const nom = nomInput.value.trim();
        const nomValidator = Validator.nameValidator("Le nom", 5, 50, nom);

        if (nomValidator) {
            showError(nomInput, nomValidator.message);
            isNameValid = false;
        }
        else
        {
            showError(nomInput, "");
            isNameValid = true;
        }
        checkFormValidity();
    }
);

// Validation du champ description a la saisie
descriptionInput.addEventListener("input", () => {
        const description = descriptionInput.value.trim();
        const descriptionValidator = Validator.nameValidator("La description", 15, 1000, description);

        if (descriptionValidator) {
            showError(descriptionInput, descriptionValidator.message);
            isDescriptionValid = false;
        }
        else
        {
            showError(descriptionInput, "");
            isDescriptionValid = true;
        }
        checkFormValidity();
    }
);

// Validation du chaamp de photo a la selection
photoInput.addEventListener("change", () => {
    const file = photoInput.files[0];
    if (!file) {
        showError(photoInput, "La photo est obligatoire.");
        isPhotoValid = false;
    }
    else if (!file.type.startsWith("image/")) {
        showError(photoInput, "Le ficher doit etre une image.");
        isPhotoValid = false;
    }
    else
    {
        showError(photoInput, "");
        isPhotoValid = true;
    }
    checkFormValidity();
});

// Validation du chaamp de type a la selection
typeInput.addEventListener("change", () => {
    if (typeInput.value === "") {
        showError(typeInput, "Veuillez selectionner un type.");
        isTypeValid = false;
    }
    else
    {
        showError(typeInput, "");
        isTypeValid = true;
    }
    checkFormValidity();
});



// Desactive le boutton si les champs est vide
frmAddRealisation.addEventListener("reset", () => {
    isNameValid = false;
    isDescriptionValid = false;
    isPhotoValid = false;
    isTypeValid = false;

    btnSubmit.disabled =true;
});