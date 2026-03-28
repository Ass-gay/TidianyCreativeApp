// Recuperation des champs de formulaire
const nomInput = document.getElementById("nom");
const descriptionInput = document.getElementById("description");
const photoInput = document.getElementById("photo");
const typeInput = document.getElementById("type");
const frmAddRealisation = document.getElementById("addRealisationForm");
const btnSubmit = frmAddRealisation.querySelector("button[type='submit']");

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

// Validation du champ nom a la saisie
nomInput.addEventListener("input", () => {
        const nom = nomInput.value.trim();
        const nomValidator = Validator.nameValidator("Le nom", 5, 50, nom);

        if (nomValidator) {
            showError(nomInput, nomValidator.message);
        }
        else
        {
            showError(nomInput, "");
        }
        checkFormValidaty();
    }
);

// Validation du champ description a la saisie
descriptionInput.addEventListener("input", () => {
        const description = descriptionInput.value.trim();
        const descriptionValidator = Validator.nameValidator("La description", 15, 70, description);

        if (descriptionValidator) {
            showError(descriptionInput, descriptionValidator.message);
        }
        else
        {
            showError(descriptionInput, "");
        }
        checkFormValidaty();
    }
);

// Validation du chaamp de photo a la selection
photoInput.addEventListener("change", () => {
    const file = photoInput.files[0];
    if (!file) {
        showError(photoInput, "La photo est obligatoire.");
    }
    else if (!file.type.startsWith("image/")) {
        showError(photoInput, "Le ficher doit etre une image.");
    }
    else
    {
        showError(photoInput, "");
    }
    checkFormValidaty();
});

// Validation du chaamp de type a la selection
typeInput.addEventListener("change", () => {
    if (typeInput.value === "") {
        showError(typeInput, "Veuillez selectionner un type.");
    }
    else
    {
        showError(typeInput, "");
    }
    checkFormValidaty();
});

// Active le bouton de valdation si les deux champs est valide
function checkFormValidaty()
{
    const nom = nomInput.value.trim();
    const description = descriptionInput.value.trim();
    const photo = photoInput.files[0];
    const type = typeInput.value.trim();

    const isNameValid = Validator.nameValidator("Le nom", 5, 50, nom);
    const isDescriptionValid = Validator.nameValidator("La description", 15, 70, description);
    const isPhotoValid = photo && photo.type.startsWith("image/");
    const isTypeValid = type !== "";

    btnSubmit.disabled = !(isNameValid,isDescriptionValid, isPhotoValid, isTypeValid);
}

// Desactive le boutton si les champs est vide
frmAddRealisation.addEventListener("reset", () => {
    btnSubmit.disabled =true;
});