# Autenticação com LDAP

### Descrição

  -Esse código tem como objetivo receber os dados de um formulário de login e com base nos usuários de windows registrados na intranet, estabelecer permissões ao usuário.

### Arquivo de autenticação

  -O arquivo que realiza essse processo está na pasta "assets/php".

  -No início do arquivo, a sessão é iniciada para que posteriormente sejam salvos alguns dados, logo após são definidas as variáveis que participarão da autenticação: "usuário" e "senha" que virão do formulário de login e "dominio" que deve conter o nome de sua intranet(Essa informação pode ser obtida ao passar o mouse sobre o símbolo da sua conexão intranet).

  -Depois nós definimos o "ldap_dn" que tem o formato usuario@dominio, que são as variáveis que criamos anteriormente, o "ldap_senha" é exatamente igual a variável "senha" criada anteriormente.

  -No "ldap_con" nós estamos estabelecendo uma conexão com o domínio intranet e logo após, estamos setando algumas opções para essa conexão.

  -No "ldap_bind" nós verificamos se o usuário e senha digitados é compatível com alguma conta windows da intranet. Após esse passo, nós estabelemos  o "filter", que define qual será nosso parâmetro na pesquisa por um usuário(nesse caso, será pelo nome do usuário), depois de definido o "filter", nós fazemos uma busca com o "ldap_search" e armazenamos o resultado na variável "result", por fim, selecionamos o que desejamos de "result" e armazenamos em "entries".

  -Por fim, utilizamos "if" e "elif" para verificar a qual grupo de usuários aquele login e senha pertencem, nesse exemplo apenas quem pertence aos grupos "Administrators", "faturamento" e "financeiro" pode logar, se existir algum usuário que tem conta windows na intranet mas não está em nenhum desses grupos, ele não poderá logar. Após entrar em algum "if" são salvas informações referentes ao nome, id, acesso e loggedin, essa chave "acesso" pode ser usada para gerir permissões dentro do site.

### O que eu preciso alterar?

  -Variável domínio do arquivo "autentica.php" para o nome da sua intranet.

  -Nos lugares onde temos a string "dc=exemplo,dc=intra" ou 'DC=exemplo,DC=intra' você deve alterar para o nome da sua intranet separando pelo ponto, por exemplo, se o nome do domínio de sua intranet é "zelda.intra", suas strings ficarão assim: "dc=zelda,dc=intra" ou 'DC=zelda,DC=intra'

  -Dentro dos "in_array" dos "if" você deve alterar o "CN" para o nome do grupo que você quer filtrar, por exemplo, se nos seus grupos de usuários você criou um grupo chamado "marketing" e você quer que apenas ele tenha acesso ao site, o código deverá ter dentro do if de "ldap_bind", apenas um if contendo "CN= total" no lugar de "CN=Administrators" e o else que contém o alert.

### Pesquisas úteis

  -Para entender melhor a estrutura do windows você pode pesquisar por "organization unit windows"
  -Para entender melhor o código do ldap você pode pesquisar por "ldap php"