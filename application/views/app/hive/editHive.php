    

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">
        <!--        <li class=""><a aria-expanded="true" href="#tab_1-1" data-toggle="tab">Historique</a></li>-->
        <li class=""><a aria-expanded="false" href="#tab_2-2" data-toggle="tab">Colonnie</a></li>
        <li class="active"><a aria-expanded="false" href="#tab_3-2" data-toggle="tab">Ruche</a></li>
        <li class="pull-left header"><i class="fa fa-th"></i> Ruche</li>
    </ul>

   
    <div class="tab-content">
        <!--        <div class="tab-pane" id="tab_1-1">
                    Historique
                </div>-->

        <!-- COLONIE -->
        <div class="tab-pane" id="tab_2-2">
            
            <form name="hive" id="formColony">

<input value="<?=$colony->id_colony?>" type="hidden" class="form-control" name="id_colony">
            <div class="form-group">
                <label>Identifiant colonie</label>
                <input value="<?=$colony->libelle?>" type="text" class="form-control" name="libelle">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Marquage reine</label>
                        <select id="marquage" name="marquage" class="form-control">
                            <option value="Aucun">Aucun</option>
                            <option value="Bleu">Bleu</option>
                            <option value="Blanc">Blanc</option>
                            <option value="Jaune">Jaune</option>
                            <option value="Rouge">Rouge</option>
                            <option value="Vert">Vert</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label>Espece</label>
                        <input value="<?=$colony->espece?>" type="text" class="form-control" name="espece">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Agressivité de la colonie</label>
                        <select id="agressivite" name="agressivite" class="form-control">
                            <option value="Faible">Faible</option>
                            <option value="Moyenne">Moyenne</option>
                            <option value="Forte">Forte</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Activité</label>
                        <select id="activite" name="activite" class="form-control">
                            <option value="Faible">Faible</option>
                            <option value="Moyenne">Moyenne</option>
                            <option value="Forte">Forte</option>
                        </select>
                    </div>
                </div>
            </div>

                        <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                <label>Affectation 1</label>
                <input value="<?=$colony->affectation_1?>"  type="text" class="form-control" name="affectation_1">
            </div>
                </div>
                <div class="col-md-6">
                       <div class="form-group">
                <label>Affectation 2</label>
                <input value="<?=$colony->affectation_2?>"  type="text" class="form-control" name="affectation_2">
            </div>
                </div>
            </div>
            
               <div class="form-group">
                      <label>Notes</label>
                      <textarea value="<?=$colony->c_commentaire?>" class="form-control" rows="3" placeholder="Votre commentaire..." name="c_commentaire"></textarea>
              </div>
            

                
               <div class="checkbox">
                  <label>
                    <input <?php if($colony->reine_presente == 1){echo "checked";}?> name="reine_presente" type="checkbox"> Reine présente
                  </label>
                </div>
                 </form>

        </div>

        <!-- RUCHE -->
        <div class="tab-pane active" id="tab_3-2">
            <form role="form" name="hive" id="formHive">
          


  <input value="<?=$hive->id_beehive?>"  type="hidden" class="form-control" name="id_beehive">
    <div class="form-group">
                <?php
                echo "<label>Rucher</label>";
                echo'<select id="id_beehive" name="id_apiary" class="form-control">';

                //liste des ruchers
                foreach ($ruchers as $value) {

                   
                    if($value->id_rucher == $hive->id_apiary ){
                         echo "<option value='$value->id_rucher' selected>$value->libelle</option>";
                    }else{
                         echo "<option value='$value->id_rucher'>$value->libelle</option>";
                    }
                }

                echo '</select>';
                ?>
            </div>


            <div class="form-group">
                <label>Identifiant ruche</label>
                <input  value="<?=$hive->nom?>" type="text" class="form-control"  class="form-control" name="nom" minlength="2" required>
            </div>
            <div class="form-group">
                <label>Type de ruche</label>
                <input  value="<?=$hive->beehive_type?>" name="beehive_type" type="text" class="form-control" >
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Matière</label>
                        <select id ="beehive_matiere" name="beehive_matiere" class="form-control">
                            <option value="Bois">Bois</option>
                            <option value="Plastique">Plastique</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Etat</label>
                        <select id="etat" name="etat" class="form-control">
                            <option value="Mauvais">Mauvais</option>
                            <option value="Moyen" >Moyen</option>
                            <option value="Bon">Bon</option>
                            <option value="Excellent">Excellent</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nb Corps</label>
                        <input name="nombre_corps" value="<?=$hive->nombre_corps?>" type="text" class="form-control" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nb Hausses</label>
                        <input name="nombre_hausses" value="<?=$hive->nombre_hausses?>" type="text" class="form-control" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nb Cadres</label>
                        <input name="nombre_cadres" value="<?=$hive->nombre_cadres?>"  type="text" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Orientation</label>
                    <select id="orientation" name="orientation" class="form-control">
                        <option value="Sud">Sud</option>
                        <option value="Sud-Ouest">Sud-Ouest</option>
                        <option value="Sud-Est">Sud-Est</option>
                        <option value="Nord">Nord</option>
                        <option value="Nord-Ouest">Nord-Ouest</option>
                        <option value="Nord-Est">Nord-Est</option>
                        <option value="Est">Est</option>
                        <option value="Ouest">Ouest</option>
                    </select>

                </div>

                <div class="col-md-6">
                    <label>Exposition de l'emplacement</label>
                    <select id="exposition_soleil"  name="exposition_soleil" class="form-control">
                        <option value="Ensoleillé">Ensoleillé</option>
                        <option value="Partiellement ensoleillé">Partiellement ensoleillé</option>
                        <option value="A l'ombre">A l'ombre</option>
                    </select>
                </div>
            </div>         
            <div class="form-group">
                      <label>Notes</label>
                      <textarea  class="form-control" rows="3" placeholder="Votre commentaire..." name="commentaire"><?=$hive->commentaire?></textarea>
              </div>
<!--            <div class="form-group">
                <div class="checkbox icheck">
                    <label>
                        <input name="vide" type="checkbox"> Ruche vide
                    </label>
                </div>
            </div>-->
                
                <div class="checkbox">
                  <label>
                      
                    <input name="vide" type="checkbox" <?php if($hive->vide == 1){ echo "checked";}?>> Ruche vide
                  </label>
                </div>
                
                </form>

        </div>

    <div class="box-footer">
        <a href="<?= base_url()."/hive/hiveList/"?>" class="btn btn-default"><i class="fa fa-angle-left"></i> Retour</a>
        <a  onclick="delete_apiary()" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
        <button onclick="saveHive()" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Sauvegarder</button>
    </div>
        <!-- /.tab-pane -->
    </div>
   
  
    <!-- /.tab-content -->


</div>
    

 
   