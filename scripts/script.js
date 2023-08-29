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
    function formatarNome(inputElement) {
      inputElement.addEventListener('input', function() {
        var inputValue = inputElement.value;
        
        // Remover caracteres não permitidos
        inputValue = inputValue.replace(/[^A-Za-z ]/g, '');
        
        // Verificar se o primeiro caractere é uma letra
        if (inputValue.length > 0 && !/^[A-Za-z]/.test(inputValue.charAt(0))) {
          inputValue = inputValue.substring(1);
        }
        
        // Atualizar o valor do campo de entrada com a máscara aplicada
        inputElement.value = inputValue;
      })};
    
    