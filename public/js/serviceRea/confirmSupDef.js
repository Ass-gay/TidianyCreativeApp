document.addEventListener("DOMContentLoaded", function (){
    const btnSupDefElements = document.querySelectorAll(".btn-sup-def");
    
        btnSupDefElements.forEach((btnSupDef) => {
            btnSupDef.addEventListener("click", function (event) {
            event.preventDefault();

            const serviceReaId = this.getAttribute('data-id');
            const serviceReaName = this.getAttribute('data-name');

            Swal.fire({
                title: `Veuillez-vous bien Supprimer definitivement la realisation  ${serviceReaName}`,
                text: "Cette action est irreversibile !",
                icon: "warning",
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                cancelButtontext: 'Annuler la suppression definitive',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Oui, supprime',
            }).then((reponse) => {
                if (reponse.isConfirmed) {
                    window.location.href = `serviceReaMainController?id=${serviceReaId}&action=supDef`;
                }
            })
        })
        })
});