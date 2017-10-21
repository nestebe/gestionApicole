<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Nouvelle visite</h3>
    </div><!-- /.box-header -->
    <!-- form start -->

    <div class="box-body">
        <form id="form-inspection" action="<?= base_url() . "inspection/create_inspection" ?>" role="form"  method="post">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Rucher</label>
                        <select id="rucher" name="rucher" class="form-control select2">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ruche</label>
                        <select  id="ruche" name="id_ruche" class="form-control" required>
<!--                            <option value="Faible">Faible</option>
                            <option value="Moyenne">Moyenne</option>
                            <option value="Forte">Forte</option>-->
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">

                <label>Date de visite</label>
                <input type='text' class="form-control" id='datetimepicker4' name="date_visite" required/>

            </div>
            <div class="form-group">
                <label>Activité de la ruche</label>
                <select id="activite" name="activite" class="form-control">
                    <option value="Faible">Faible</option>
                    <option value="Moyenne">Moyenne</option>
                    <option value="Forte">Forte</option>
                </select>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nb cadres de couvain</label>
                        <input value="0" name="nombre_cadre_cuvain" type="text" class="form-control" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nb cadres de pollen</label>
                        <input name="nombre_cadre_pollen" value="0" type="text" class="form-control" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nb cadres de miel</label>
                        <input name="nombre_cadre_miel" value="0" type="text" class="form-control" >
                    </div>
                </div>
            </div>



                    <div class="checkbox">
                        <label>
                            <input name="est_malade" type="checkbox"> Ruche Malade
                        </label>
                    </div>
         
       
                    <div class="form-group">
                        <label>Maladie</label>
                        <select id="maladie" name="maladie" class="form-control">
                            <option value="Ascosphaerose">Aucune</option>
                            <option value="Ascosphaerose">Ascosphaerose</option>
                             <option value="Acariose">Acariose</option>
                            <option value="Loque">Loque</option>
                            <option value="Nosémose">Nosémose</option>
                            <option value="Dégénérescence des abeilles">Dégénérescence des abeilles</option>
                            <option value="Varroase">Varroase</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
  


   <div class="form-group">
        <label>Traitement Maladie</label>
      <input name="traitement" value="" type="text" class="form-control" >
    </div>
 
    <div class="form-group">
        <label>Commentaire</label>
        <textarea value=""  class="form-control" rows="3" placeholder="Votre commentaire..." name="commentaire"></textarea>
    </div>


</form>



</div><!-- /.box-body -->

<div class="box-footer">

    <a  href="<?= base_url() . "inspection/inspectionList" ?>" class="btn btn-default"><i class="fa fa-angle-left"></i> Retour</a>
    <button id="btn-save" onclick="createInspection()" class="btn btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
</div>
</div><!-- /.box -->