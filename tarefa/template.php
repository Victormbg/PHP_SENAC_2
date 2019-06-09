<html>
<head>
<meta charset="utf-8" />
<title>Gerenciador de Tarefas</title>
</head>
<body>
<h1>Gerenciador de Tarefas</h1>
<form action="tarefa.php">
<fieldset>
<legend>Nova tarefa</legend>
<label>
Tarefa:
<input type="text" name="nome"/>
<br/>
<br/>
</label>
<label>
Descricao(Opcional):
<textarea name="descricao"></textarea>
<br/>
<br/>
</label>
<label>
Prazo(Opcional):
<input type="text" name="prazo"/>
<br/>
<br/>
</label>
<fieldset>
<legend>Prioridade:</legend>
<label>
<input type="radio" name="prioridade" value="baixa" checked />
Baixa
<input type="radio" name="prioridade" value="media" checked />
Media
<input type="radio" name="prioridade" value="alta" checked />
Alta
</label>
<br/>
<fieldset>
		<label>
			Tarefa concluida:
			<input type="checkbox" name="concluida" value="sim"/>
		<br/>
		<br/>
		</label>
		<input type="submit" value="Cadastrar"/>
	</fieldset>
</form>
<table>
	<tr>
		<th>Tarefa</th>
		<th>Descricao</th>
		<th>Prazo</th>
		<th>Prioridade</th>
		<th>Concluida</th>
	</tr>
	<?php foreach ($lista_tarefas as $tarefa): ?>
		<tr>
		<td><?php echo $tarefa ['nome']; ?></td>
		<td><?php echo $tarefa ['descricao']; ?></td>
		<td><?php echo $tarefa ['prazo']; ?></td>
		<td><?php echo $tarefa ['prioridade']; ?></td>
		<td><?php echo $tarefa ['concluida']; ?></td>
		</tr>
		<?php endforeach; ?>
		</table>
</body>
</html>