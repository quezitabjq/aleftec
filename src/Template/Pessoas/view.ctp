<div class="pessoas view col-lg-10 col-md-9">
    <h3><?= h($pessoa->nome) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nome</th>
            <td><?= h($pessoa->nome) ?></td>
        </tr>
        <tr>
            <th>Sobrenome</th>
            <td><?= h($pessoa->sobrenome) ?></td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td><?= h($pessoa->sexo) ?></td>
        </tr>
         <tr>
            <th>Email</th>
            <td><?= h($pessoa->email) ?></td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td><?= h($pessoa->telefone) ?></td>
        </tr>
 
        <tr>
            <th>'CPF</th>
            <td><?= $this->Number->format($pessoa->cpf) ?></td>
        </tr>
     
    </table>
   
</div>
