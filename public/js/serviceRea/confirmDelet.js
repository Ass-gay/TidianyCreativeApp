const btnDeleteElementsUser = document.querySelectorAll(".btn-delete-serviceRea");
    
        btnDeleteElementsServiceRea.forEach((btnDeleteServiceRea) => {
            btnDeleteServiceRea.addEventListener("click", function (event) {
            event.preventDefault();

            const serviceReaId = this.getAttribute('data-id-serviceRea');
            const serviceReaName = this.getAttribute('data-name-serviceRea');

            Swal.fire({
                title: `Veuillez-vous bien supprimer l'utilisateur  ${serviceReaName}`,
                text: "Cette action est irreversibile !",
                icon: "warning",
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                cancelButtontext: 'Annuler la suppression',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer',
            }).then((reponse) => {
                if (reponse.isConfirmed) {
                    window.location.href = `serviceReaMainController?id=${serviceReaId}&action=delete`;
                }
            })
        })
    });