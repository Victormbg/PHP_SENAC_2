<html>
    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de Tarefas: </title>
    </head>
    <body>
        <h1>Gerenciador de Tarefas</h1>
        <form action="tarefas.php" method="post">
            <fieldset>
                <legend>Nova tarefa</legend>
                <label>
                    Tarefa:
                    <input type="text" name="nome" />
                    <br />
                    <br />
                </label>
                <label>
                    Descrição (Opcional):
                    <textarea name="descricao"></textarea>
                    <br />
                    <br />
                </label>
                <label>
                    Prazo (Opcional):
                    <input type="text" name="prazo" />
                    <br />
                    <br />
                </label>
                <fieldset>
				
				<legend>Prioridade:</legend>
				<label> 
				<input type="radio" name="prioridade" value="1" checked />
				Baixa
				<input type="radio" name="prioridade" value="2" /> 
				Média
				<input type="radio" name="prioridade" value="3" />
				Alta
				</label>
			        <br />
                    <br />
                </fieldset>
                <label> 
				Tarefa concluída: 
				<input type="checkbox" name="concluida" value="1" /> 
				<br/>
                <br/>
				</label>	
                <input type="submit" value="Cadastrar" />  <input type="submit" value="Submit" name="submit">
            </fieldset>
        </form>
        <table>
            <tr>
                <th>Tarefa</th>
                <th>Descricao</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluída</th>
            </tr>
            <?php foreach($lista_tarefas as $tarefa):?>
                <tr>
                    <td><?php echo $tarefa ['nome']; ?> </td>
                    <td><?php echo $tarefa ['descricao']; ?> </td>
                    <td><?php echo $tarefa ['prazo']; ?> </td>
					<td><?php echo $tarefa ['prioridade']; ?></td>
					<td><?php echo $tarefa ['concluida']; ?></td>             
                </tr>
            <?php endforeach;?>
        </table>
     </body>
</html>
