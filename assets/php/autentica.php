<?php
	session_start();

	$usuario = $_POST['username'];
	$senha = $_POST['password'];
	$dominio = "exemplo.intra";
 
// Verifica se os dados de login foram submetidos.
	if ( !isset($usuario, $senha) ) {
		die ('Preencha todos os campos');
	}

	//Distinguished Name, ex: eduardo.brandao@exemplo.intra
	$ldap_dn = $usuario . '@'. $dominio;
	//Senha de acesso
	$ldap_senha = $senha;
	
	$ldap_con = ldap_connect($dominio);
	
	ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
	
	if(ldap_bind($ldap_con, $ldap_dn, $ldap_senha)) {

		//Filtrando o usuário pelo cn(common name), ou seja, o login comum
		$filter = "(cn=" . $usuario . ")";
		$result = ldap_search($ldap_con,"dc=exemplo,dc=intra",$filter) 
					or exit("Erro na pesquisa");
		$entries = ldap_get_entries($ldap_con, $result);
		
		//Se usuário está no grupo administradores
		if (in_array('CN=Administrators,CN=Builtin,DC=exemplo,DC=intra', $entries[0]['memberof'])) 
		{
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $usuario;
			$_SESSION['id'] = $id;
			$_SESSION['acesso'] = 'adm';
			header('Location: ../../home/index.php');
		}
		
		//Se usuário está no grupo faturamento
		elseif
		(in_array('CN=faturamento,CN=Builtin,DC=exemplo,DC=intra', $entries[0]['memberof'])) 
		{
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $usuario;
			$_SESSION['id'] = $id;
			$_SESSION['acesso'] = 'faturamento';
			header('Location: ../../home/index.php');
		}
		
		//Se usuário está no grupo financeiro
		elseif
		(in_array('CN=financeiro,CN=Builtin,DC=exemplo,DC=intra', $entries[0]['memberof'])) 
		{
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $usuario;
			$_SESSION['id'] = $id;
			$_SESSION['acesso'] = 'financeiro';
			header('Location: ../../home/index.php');
		}

		//Se não pertencer a nenhum desses grupos não pode logar
		else{
			$_SESSION['message'] = 	"<div class='alert alert-danger' style='text-align:center'>
	  									<strong>Usuário ou senha inválidos</strong>
									</div>";
			header('Location: ../../index.php');
		}
	  
	} else {
		$_SESSION['message'] = 	"<div class='alert alert-danger' style='text-align:center'>
  									<strong>Usuário ou senha inválidos</strong>
								</div>";
		header('Location: ../../index.php');
	}

?>