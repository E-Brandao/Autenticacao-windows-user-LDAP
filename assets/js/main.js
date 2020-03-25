//1)FUNÇÃO PARA VERIFICAR AS PERMISSÕES
  function permissions(query)
  {
    var result;
    $.ajax({
      async:false,
      url: '../assets/php/functions/permissoes.php',
      type: 'POST',
      data:{query:query},
      success:function(data)
      {
        result = data;
      }
    });
    return result
  };


//02)ONCLICK DESLOGA
  $(".btn-exit").on('click', function(){
    window.location.href = "../assets/php/desloga.php"
  });
