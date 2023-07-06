// Mascara do cpf
function mascaraCPF(cpf) {
      cpf = cpf.replace(/\D/g, '');
      cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
      cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
      cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
      return cpf;
    }

    function formatarCPF(cpfInput) {
      cpfInput.value = mascaraCPF(cpfInput.value);
      cpfInput.value = cpfInput.value.slice(0, 14); 
    }


// formatação da data de nascimento
    function formatarDataNascimento(dataNascimentoInput) {
      dataNascimentoInput.value = mascaraDataNascimento(dataNascimentoInput.value);
      dataNascimentoInput.value = dataNascimentoInput.value.slice(0, 10); 
    }

    
    