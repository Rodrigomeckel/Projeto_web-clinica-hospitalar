function imprimirFormulario() {
    var formulario = document.getElementById("meuFormulario");
    var janelaImprimir = window.open('', '', 'width=800,height=600');
    janelaImprimir.document.write('<html><head><title>Formulário</title></head><body>');
    janelaImprimir.document.write(formulario.innerHTML);
    janelaImprimir.document.write('</body></html>');
    janelaImprimir.document.close();
    janelaImprimir.print();
}

const deleteLinks = document.querySelectorAll('.delete-link');

deleteLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        const data = this.getAttribute('data-data');
        const horario = this.getAttribute('data-horario');
        const especialidade = this.getAttribute('data-especialidade');

        Swal.fire({
            title: 'Você tem certeza?',
            text: 'Essa ação é irreversível.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, quero deletar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirecionar para a página de exclusão com os parâmetros passados
                window.location.href = `delete-consulta.php?data=${data}&horario=${horario}&especialidade=${especialidade}`;
            }
        });
    });
});
