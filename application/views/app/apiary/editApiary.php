<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Fiche Rucher</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
 
        <div class="box-body">
            <form id="form-rucher" action="<?=base_url()."apiary/update_apiary" ?>" role="form"  method="post">
            <input  value="<?=$apiary->id_rucher?>" type="hidden" class="form-control" name="id-rucher">
            <div class="form-group">
                <label>Nom du rucher</label>
                <input value="<?=$apiary->libelle?>" type="text" class="form-control" name="nom-rucher" minlength="2" maxlength="100" required>
            </div>
            <div class="form-group">
                <label>Adresse</label>
                <input value="<?=$apiary->adresse?>"  type="text" value="" class="form-control" name="adresse-1">
            </div>
            <div class="form-group">
                <label>Complément d'adresse</label>
                <input value="<?=$apiary->adresse_2?>" type="text" class="form-control" name="adresse-2">
            </div>
            <div class="row">
                <div class="col-md-6">
           <div class="form-group">
                <label>Code Postal</label>
                <input value="<?=$apiary->cp?>" type="text" class="form-control" name="code-postal">
            </div>
                </div>
                <div class="col-md-6">
                    
            <div class="form-group">
                <label>Commune</label>
                <input value="<?=$apiary->ville?>" type="text" class="form-control" name="commune">
            </div>
                </div>
                  </div>
              <div class="form-group">
                      <label>Notes sur le rucher</label>
                      <textarea  class="form-control" rows="3" placeholder="Votre commentaire..." name="description"> <?=$apiary->description?> </textarea>
              </div>
            
                
              </form>



        </div><!-- /.box-body -->

        <div class="box-footer">
            
            <a href="<?=  base_url()."apiary/apiaryList" ?>" class="btn btn-default"><i class="fa fa-angle-left"></i> Retour</a>
             <a onclick="delete_apiary()" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
             <button  onclick="req_save()" class="btn btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
        </div>
</div><!-- /.box -->