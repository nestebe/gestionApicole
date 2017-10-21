<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Nouvelle visite</h3>
    </div><!-- /.box-header -->
    <!-- form start -->

    <div class="box-body">
        <form id="form-inspection" action="<?= base_url() . "inspection/create_inspection" ?>" role="form"  method="post">
          <input value="<?=$inspection->id_inspection?>" name="id_inspection" type="hidden" class="form-control" >
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
                <?php
                    $date_visite = new DateTime($inspection->date_visite);
                   echo '<input type="text" class="form-control" id="datetimepicker4" value="'.$date_visite->format('d/m/Y HH:MM').'"  name="date_visite" required/>'
                ?>
                

            </div>
            <div class="form-group">
                <label>Activité de la ruche</label>
                <select id="activite" name="activite" class="form-control">
                    
                    <option value="Faible"  <?php if($inspection->activite == "Faible"){ echo "selected";}?>>Faible</option>
                    <option value="Moyenne" <?php if($inspection->activite == "Moyenne"){ echo "selected";}?>>Moyenne</option>
                    <option value="Forte" <?php if($inspection->activite == "Forte"){ echo "selected";}?>>Forte</option>
                </select>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nb cadres de couvain</label>
                        <input value="<?=$inspection->nombre_cadre_cuvain?>" name="nombre_cadre_cuvain" type="text" class="form-control" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nb cadres de pollen</label>
                        <input name="nombre_cadre_pollen" value="<?=$inspection->nombre_cadre_pollen?>" type="text" class="form-control" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nb cadres de miel</label>
                        <input name="nombre_cadre_miel" value="<?=$inspection->nombre_cadre_miel?>" type="text" class="form-control" >
                    </div>
                </div>
            </div>



                    <div class="checkbox">
                        <label>
                            <input name="est_malade" type="checkbox" <?php if($inspection->est_malade == 1){ echo "checked";}?>> Ruche Malade
                        </label>
                    </div>
         
       
                    <div class="form-group">
                        <label>Maladie</label>
                        <select id="maladie" name="maladie" class="form-control">
                            <option value="Aucune" <?php if($inspection->maladie == "Aucune"){ echo "selected";}?>>Aucune</option>
                            <option value="Ascosphaerose" <?php if($inspection->maladie == "Ascosphaerose"){ echo "selected";}?>>Ascosphaerose</option>
                            <option value="Acariose" <?php if($inspection->maladie == "Acariose"){ echo "selected";}?>>Acariose</option>
                            <option value="Loque" <?php if($inspection->maladie == "Loque"){ echo "selected";}?>>Loque</option>
                            <option value="Nosémose" <?php if($inspection->maladie == "Nosémose"){ echo "selected";}?>>Nosémose</option>
                            <option value="Dégénérescence des abeilles" <?php if($inspection->maladie == "Dégénérescence"){ echo "selected";}?>>Dégénérescence des abeilles</option>
                            <option value="Varroase" <?php if($inspection->maladie == "Varroase"){ echo "selected";}?>>Varroase</option>
                            <option value="Autre" <?php if($inspection->maladie == "Autre"){ echo "selected";}?>>Autre</option>
                        </select>
                    </div>
  


   <div class="form-group">
        <label>Traitement Maladie</label>
        <input name="traitement" value="<?=$inspection->traitement?>" type="text" class="form-control" >
    </div>
 
    <div class="form-group">
        <label>Commentaire</label>
        <textarea   class="form-control" rows="3" placeholder="Votre commentaire..." name="commentaire"><?=$inspection->commentaire?></textarea>
    </div>


</form>



</div><!-- /.box-body -->

<div class="box-footer">

    <a  href="<?= base_url() . "inspection/inspectionList" ?>" class="btn btn-default  pull-left"><i class="fa fa-angle-left"></i> Retour</a>
        <button id="btn-save" onclick="delete_inspection()" class="btn btn-danger pull-left"><i class="fa fa-close"></i> Supprimer</button>
    
    <button id="btn-save" onclick="createInspection()" class="btn btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
</div>
</div><!-- /.box -->