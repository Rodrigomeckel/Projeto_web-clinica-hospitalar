const inputCPF = document.querySelector('#cpf');

inputCPF.addEventListener('keypress', () => {
    let inputLength = inputCPF.value.length;

    if (inputLength === 3 || inputLength === 7) {
        inputCPF.value += '.';
    } else if (inputLength === 11) {
        inputCPF.value += '-';
    }
});

const maskCell = document.querySelector('#cell');

maskCell.addEventListener('keypress', () => {
    let inputLength = maskCell.value.length;

    if (inputLength === 0) {
        maskCell.value += '(';
    } else if (inputLength === 3) {
        maskCell.value += ') ';
    } else if (inputLength === 10) {
        maskCell.value += '-';
    }
});

function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');

    if (cpf == '') return false;

    // Valida o formato do CPF
    if (
        cpf.length != 11 ||
        cpf == '00000000000' ||
        cpf == '11111111111' ||
        cpf == '22222222222' ||
        cpf == '33333333333' ||
        cpf == '44444444444' ||
        cpf == '55555555555' ||
        cpf == '66666666666' ||
        cpf == '77777777777' ||
        cpf == '88888888888' ||
        cpf == '99999999999'
    ) {
        return false;
    }

    // Valida primeiro dígito verificador
    var add = 0;
    for (var i = 0; i < 9; i++) {
        add += parseInt(cpf.charAt(i)) * (10 - i);
    }
    var rev = 11 - (add % 11);
    if (rev == 10 || rev == 11) rev = 0;
    if (rev != parseInt(cpf.charAt(9))) return false;

    // Valida segundo dígito verificador
    add = 0;
    for (i = 0; i < 10; i++) {
        add += parseInt(cpf.charAt(i)) * (11 - i);
    }
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11) rev = 0;
    if (rev != parseInt(cpf.charAt(10))) return false;

    return true;
}

function cadastrar() {
    var cpf = document.getElementById('cpf').value;

    if (validarCPF(cpf)) {
        // O CPF é válido, continue com o cadastro
        document.querySelector('form').submit();
    } else {
        // O CPF é inválido, exiba uma mensagem de erro
        Swal.fire({
            icon: 'error',
            title: 'CPF Inválido',
            text: 'Por favor, insira um CPF válido.',
        });
    }
}
inputCPF.addEventListener('input', () => {
    let cpf = inputCPF.value;

    // Define o valor do input como o CPF formatado
    cpf = cpf.replace(/[^\d]/g, ''); // Remove caracteres não numéricos

    if (cpf.length >= 3 && cpf.length <= 6) {
        cpf = cpf.replace(/^(\d{3})(\d{0,3})/, '$1.$2');
    } else if (cpf.length >= 7 && cpf.length <= 9) {
        cpf = cpf.replace(/^(\d{3})(\d{3})(\d{0,3})/, '$1.$2.$3');
    } else if (cpf.length >= 10) {
        cpf = cpf.replace(/^(\d{3})(\d{3})(\d{3})(\d{0,2})/, '$1.$2.$3-$4');
    }

    // Valida o CPF usando a função validarCPF
    if (validarCPF(cpf)) {
        // CPF válido
        inputCPF.style.borderColor = 'green';
    } else {
        // CPF inválido
        inputCPF.style.borderColor = 'red';
    }
});
