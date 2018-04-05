
<div class="eventos view col-lg-10 col-md-9">
    <h3><?= h($evento->nome) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <td><?= h($evento->nome) ?></td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td><?= h($evento->descricao) ?></td>
        </tr>
           <tr>
            <th>Valor</th>
            <td><?= $this->Number->format($evento->valor) ?></td>
        </tr>
           <tr>
            <th>Máximo de Inscritos</th>
            <td><?= $this->Number->format($evento->maxinscritos) ?></td>
        </tr>
        <tr>
            <th>Local</th>
            <td><?= h($evento->local) ?></td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td><?= h($evento->endereco) ?></td>
        </tr>
        <tr>
            <th>Bairro</th>
            <td><?= h($evento->bairro) ?></td>
        </tr>
        <tr>
            <th>Usuário de Cadastro/Alteração</th>
            <td><?= $evento->has('user') ? $this->Html->link($evento->user->name, ['controller' => 'Users', 'action' => 'view', $evento->user->id]) : '' ?></td>
        </tr>
       
     
        <tr>
            <th>CEP</th>
            <td><?= $this->Number->format($evento->cep) ?></td>
        </tr>
        <tr>
            <th>Número</th>
            <td><?= $this->Number->format($evento->numero) ?></td>
        </tr>
     
        <tr>
            <th>Data de Início</th>
            <td><?= h($evento->datainicio) ?></tr>
        </tr>
        <tr>
            <th>Data Final</th>
            <td><?= h($evento->datafinal) ?></tr>
        </tr>
        
    </table>
   
</div>
