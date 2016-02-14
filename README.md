# interfacePHP
Scripts PHP com exemplo funcional de utilização de Interface.

Consumo do seriço: /service/cadastros_interface_service.php, existem dois métodos implementados por interface, criaObjetoDaInterfaceWeb() e cadastrar();

Para testar

Acessando o arquivo Testes_de_Cadastros.html, poderá ser realizado testes de inserção, para ver o funcionamento da interface aplicada.
No formulário é preciso enviar dois inputs adicionais:
1 - Nome do seriço: 
<input type="text" name="servico" value="cadastros_interface_service" /> <br />
2 - Nome da classe do registro
<input type="text" name="classeRegistroDaInterfaceWeb" value="Categoria" /><br />

Com isso o arquivo cadastros_interface_service.php vai instanciar uma classe a partir do input 'classeRegistroDaInterfaceWeb', depois irá popular o objeto com o método criaObjetoDaInterfaceWeb(), passando o $_POST carregado com os atributos específicos do objeto, logo em seguida o objeto será gravado efetivamente, com o método cadastar();





