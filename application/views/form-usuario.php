<br /><br /><br /><br /><br />
<div class="container">
    <form class="form-usuario">
        <div class="form-group">
          <label for="exampleInputEmail1">Digite o seu nome*</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
          <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        
        <div class="form-group">
           <label>Faça uma breve descrição da sua experiência</label>
           <textarea class="form-control" rows="3"></textarea>
        </div>
        <hr />
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Telefone ou Celular</label>
                    <input type="text" class="form-control" />
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Telefone ou Celular</label>  
                    <input type="text" class="form-control" />
                </div>
            </div>
            
            <div class="col">
                <div class="form-group">
                    <label>Whatsapp</label>  
                    <input type="text" class="form-control" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-9">
              <label for="inputCity" class="col-form-label">E-mail</label>
              <input type="email" class="form-control" />
            </div>
            <div class="form-group col-md-3">
              <label for="inputState" class="col-form-label">Registro OAB</label>
              <input type="text" class="form-control" />
            </div>
        </div>
        <hr />
        <div class="row">
            
            <div class="form-group col-md-6">
                <div class="row">
                     <div class="form-group col-md-10">
                        <input type="hidden" name="Latitude" />
                        <input type="hidden" name="Longitude" />
                        <label for="exampleInputEmail1">Logradouro</label>
                        <input type="text" class="form-control" name="Logradouro" />
                     </div>
                     <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">Número</label>
                        <input type="text" class="form-control" name="Numero" />
                     </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                      <label class="col-form-label">Bairro</label>
                      <input type="text" class="form-control" name="Bairro" />
                    </div>
                    <div class="form-group col-md-5">
                      <label class="col-form-label">Cidade</label>
                      <input type="text" class="form-control" name="Cidade" />
                    </div>
                    <div class="form-group col-md-2">
                      <label class="col-form-label">UF</label>
                      <input type="text" class="form-control" name="UF" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="button" name="btn-busca-mapa" class="btn btn-success btn-sm">clique aqui para buscar no mapa</button>
                    </div>
                </div>
                
                
            </div>
            
            <div class="form-group col-md-6">
                 <label for="exampleInputEmail1">Mapa (clique sobre o mapa para marcar sua localização)</label>
                 <div id="mapCadastro"></div>
            </div>
            
            
        </div>
        <hr />
        <div class="row">
            <div class="form-group col-md-12">
               <label for="exampleInputEmail1">Selecione as áreas de atuação</label>     
            </div>
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
        
        
        
        <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
    
</div>   