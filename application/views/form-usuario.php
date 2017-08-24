<br /><br /><br /><br /><br />
<div class="container">
    <form class="form-usuario" name="cadastro-usuario">
        <input type="hidden" name="Latitude" maxlength="100" />
        <input type="hidden" name="Longitude" maxlength="100" />
        <div class="form-group">
          <label for="exampleInputEmail1">Digite o seu nome*</label>
          <input type="text" class="form-control" name="Nome" maxlength="60" >
          <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
           <label>Faça uma breve descrição da sua experiência</label>
           <textarea class="form-control" rows="3" name="Descricao" maxlength="3000"></textarea>
        </div>
        
        
        <br />
        <br />
        <div class="row">
          <div class="form-group col-md-12">
              <label class="form-usuario-label-titulo">Informações de Contato</label>     
          </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Telefone ou Celular*</label>
                    <input type="text" class="form-control" name="Telefone1" maxlength="15" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Telefone ou Celular</label>  
                    <input type="text" class="form-control" name="Telefone2" maxlength="15" />
                </div>
            </div>
            
            <div class="col">
                <div class="form-group">
                    <label>Whatsapp</label>  
                    <input type="text" class="form-control"  name="Whatszap" maxlength="15" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-9">
              <label for="inputCity" class="col-form-label">E-mail</label>
              <input type="email" class="form-control" name="Email" maxlength="255" />
            </div>
            <div class="form-group col-md-3">
              <label for="inputState" class="col-form-label">Registro OAB</label>
              <input type="text" class="form-control" name="OAB" maxlength="12" />
            </div>
        </div>
        
        
        <br />
        <br />
        <div class="row">
          <div class="form-group col-md-12">
            <label class="form-usuario-label-titulo">Informações de Endereço</label>     
          </div>
        </div>
        <div class="row">
            
            <div class="form-group col-md-6">
                <div class="row">
                     <div class="form-group col-md-10">
                        <label for="exampleInputEmail1">Logradouro*</label>
                        <input type="text" class="form-control" name="Logradouro" maxlength="255" />
                     </div>
                     <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">Número</label>
                        <input type="text" class="form-control" name="Numero" maxlength="12" />
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                      <label class="col-form-label">Bairro*</label>
                      <input type="text" class="form-control" name="Bairro" maxlength="70" />
                    </div>
                    <div class="form-group col-md-5">
                      <label class="col-form-label">Cidade*</label>
                      <input type="text" class="form-control" name="Cidade" maxlength="100" />
                    </div>
                    <div class="form-group col-md-2">
                      <label class="col-form-label">UF*</label>
<!--                      <input type="text" class="form-control" name="UF" maxlength="2" />-->
                      <select class="form-control" name="uf">
                          <option value="1">AC</option>
                          <option value="2">AL</option>
                          <option value="3">AP</option>
                          <option value="4">AM</option>
                          <option value="5">BA</option>
                          <option value="6">CE</option>
                          <option value="7">DF</option>
                          <option value="8">ES</option>
                          <option value="9">GO</option>
                          <option value="10">MA</option>
                          <option value="11">MT</option>
                          <option value="12">MS</option>
                          <option value="13">MG</option>
                          <option value="14">PA</option>
                          <option value="15">PB</option>
                          <option value="16">PR</option>
                          <option value="17">PE</option>
                          <option value="18">PI</option>
                          <option value="19">RJ</option>
                          <option value="20">RS</option>
                          <option value="21">RN</option>
                          <option value="22">RO</option>
                          <option value="23">RR</option>
                          <option value="24">SC</option>
                          <option value="25">SP</option>
                          <option value="26">SE</option>
                          <option value="27">TO</option>
                      </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="button" name="btn-busca-mapa" class="btn btn-success btn-sm">clique aqui para buscar no mapa</button>
                        <br /><br />
                        <div id="form-cadasto-map-msg"></div>
                    </div>
                </div>
                
                
            </div>
            
            <div class="form-group col-md-6">
                 <label for="exampleInputEmail1">Mapa (clique sobre o mapa para marcar sua localização)</label>
                 <div id="mapCadastro"></div>
            </div>
            
            
        </div>
        <br />
        <br />
        <div class="row">
          <div class="form-group col-md-12">
            <label class="form-usuario-label-titulo">Selecione as áreas de atuação</label>     
          </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <?php
                   foreach($areas1 as $area){
                       echo '<div class="form-check">
                                <label class="form-check-label">
                                  <input name="areas[]" class="form-check-input" type="checkbox" value="' . $area['AreaId'] . '"> '
                                  . $area['Descricao'] .
                                '</label>
                             </div>';
                   }
                ?>
            </div>
            <div class="form-group col-md-4">
                <?php
                   foreach($areas2 as $area){
                       echo '<div class="form-check">
                                <label class="form-check-label">
                                  <input name="areas[]" class="form-check-input" type="checkbox" value="' . $area['AreaId'] . '"> '
                                  . $area['Descricao'] .
                                '</label>
                             </div>';
                   }
                ?>
            </div>
            <div class="form-group col-md-4">
                <?php
                   foreach($areas3 as $area){
                       echo '<div class="form-check">
                                <label class="form-check-label">
                                  <input name="areas[]" class="form-check-input" type="checkbox" value="' . $area['AreaId'] . '"> '
                                  . $area['Descricao'] .
                                '</label>
                             </div>';
                   }
                ?>
            </div>
            
            
        </div>
        <br />
        <div class="row">
            <div class="form-group col-md-9">
                <div id="form-cadasto-msg"></div>
            </div>
            <div class="form-group col-md-3 right">
                <input type="submit"  class="btn btn-success btn-lg" value="Salvar Informações" name="Salvar">
            </div>
        </div>
        <br /><br /><br />
  </form>
</div>   