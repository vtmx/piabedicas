# contato

<label>
  Nome [text* name placeholder "Nome"]
</label>

<label>
  E-mail [email* email placeholder "email@gmail.com"]
</label>

<label>
  Mensagem [textarea* message placeholder "Deixe sua mensagem"]
</label>

[submit "Enviar"]

## Resposta

[message]

Nome: [name]
E-mail: [email]

--
Este e-mail foi enviado do site Piabedicas (http://piabedicas.com.br)

# cadastro

<label>
  Nome da empresa [text* name placeholder "Nome da Sua Empresa"]
</label>

<label>
  Endereço [text* address placeholder "Rua Norte 211"]
</label>

<label>
  Telefone(s) [text* phone placeholder "(21) 2739-1393"]
</label>

<label>
  Funcionamento [text production placeholder "Seg a Sexta de 9h às 18h"]
</label>

<label>
  E-mail [email email placeholder "email@gmail.com"]
</label>

<label>
  Facebook [text facebook placeholder "http://facebook.com/sua-empresa"]
</label>

<label>
  Site [text site placeholder "http://sua-empresa.com.br"]
</label>

<label>
  Categoria [select category "Açougues" "Confeitarias" "Hort-Fruit" "Lanchonetes" "Mercados" "Padarias" "Restaurantes"]
</label>

<label>
  Logo do comércio
  <br>
  [file logo]
</label>

[submit "Enviar"]

## Resposta

<table>
  <tr>
    <th>Nome da empresa</th>
    <th>Endereço</th>
    <th>Funcionamento</th>
    <th>Telefone(s)</th>
    <th>E-mail </th>
    <th>Facebook</th>
    <th>Site</th>
    <th>Categoria</th>
    <th>Plano</th>
  </tr>
  <tr>
      <td>[name]</td>
      <td>[address]</td>
      <td>[production]</td>
      <td>[phone]</td>
      <td>[email]</td>
      <td>[facebook]</td>
      <td>[site]</td>
      <td>[category]</td>
      <td>[plan]</td>
</table>

--
Este e-mail foi enviado do site Piabedicas (http://piabedicas.com.br)
