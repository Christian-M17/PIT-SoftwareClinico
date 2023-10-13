<!DOCTYPE html>
<html>
<head>
  <title>LampClinic</title>
  <link rel="stylesheet" type="text/css" href="css/calendario.css">
  <link rel="shortcut icon" href="img/logo1.ico" type="image/x-icon">
</head>
<body class="body-parte2">
  <header>
    <div class="logo">
      <a href="logado.php"><img src="img/logo.png" alt="Logo"></a>
    </div>
  </header>
  <main>
    <div class="containerBotao">
      <div class="botao">
        <a><img src="img/Expand_left.png"></a>
        <label>Setembro</label>
        <a><img src="img/Expand_right.png"></a>
      </div>
    </div>
    <div class="grid-container">
      <div class="item calendario">
        <table>
          <caption>Setembro 2023</caption>
          <thead>
            <tr>
              <th>Domingo</th>
              <th>Segunda</th>
              <th>Terça</th>
              <th>Quarta</th>
              <th>Quinta</th>
              <th>Sexta</th>
              <th>Sábado</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td></td>
   
            </tr>
          </tbody>
        </table>
      </div>
      <div class="item agendamentos">
        <h2>Agendamentos</h2>
        <div id="agendamento"></div>
    
      </div>
      <div class="item medicos">
        <h2>Médicos</h2>
        <div class="medico-item">
          <img class="img1" src="img/profile.jpg" alt="Dr. José">
          <p>Dr. José</p>
          <p>Hora Disponivel: 14:30 até 20:00</p>
          <input type="text" id="patientName" placeholder="Nome do Paciente">
          <button onclick="agendarConsulta('Dr. José')" id="agendarBtn">Agendar</button>
        </div>

      </div>
    </div>
  </main>
  <script>
    function agendarConsulta(doctor) {
      const patientNameInput = document.getElementById("patientName");
      const agendamentoDiv = document.getElementById("agendamento");
      const agendarBtn = document.getElementById("agendarBtn");

      const patientName = patientNameInput.value;

      if (patientName) {
        const currentDate = new Date();
        const formattedDate = `${currentDate.getDate()}/${currentDate.getMonth() + 1}/${currentDate.getFullYear()}`;
        const formattedTime = `${currentDate.getHours()}:${currentDate.getMinutes()}`;

       
        const newAgendamentoItem = document.createElement("div");
        newAgendamentoItem.classList.add("agendamento-item");
        newAgendamentoItem.innerHTML = `
          <p>Paciente: ${patientName}</p>
          <p>Data: ${formattedDate}</p>
          <p>Hora: ${formattedTime}</p>
          <p>Médico: ${doctor}</p>
        `;
        agendamentoDiv.appendChild(newAgendamentoItem);


        patientNameInput.value = "";


        agendarBtn.disabled = true;
      } else {
        alert("Por favor, insira o nome do paciente.");
      }
    }
  </script>
</body>
</html>
