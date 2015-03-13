//http://www.linhadecodigo.com.br/artigo/3604/calendario-em-jquery-criando-calendarios-com-datepicker.aspx
$(function() {
  $("#calendar").datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    //minDate: "-120Y",
    //maxDate: 0,
    yearRange: "-120:+0",
    closeText: 'Fechar',
    prevText: '&#x3C;Anterior',
    nextText: 'Próximo&#x3E;',
    currentText: 'Hoje',
    monthNames: [
      'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
    ],
    monthNamesShort: [
      'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
    ],
    dayNames: [
      'Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'
    ],
    dayNamesShort: [
      'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'
    ],
    dayNamesMin: [
      'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'
    ]
  });
});