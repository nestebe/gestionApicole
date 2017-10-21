    

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">
        <!--        <li class=""><a aria-expanded="true" href="#tab_1-1" data-toggle="tab">Historique</a></li>-->
        <li class=""><a href="#tab_2-2" data-toggle="tab">Colonnie</a></li>
        <li class="active"><a  href="#tab_3-2" data-toggle="tab">Ruche</a></li>
        <li class="pull-left header"><i class="fa fa-th"></i> Création ruche</li>
    </ul>


    <div class="tab-content">
        <!--        <div class="tab-pane" id="tab_1-1">
                    Historique
                </div>-->


        <!-- COLONIE -->
        <div class="tab-pane" id="tab_2-2">

            <form name="hive" id="formColony">

                <div class="form-group">
                    <label>Identifiant colonie</label>
                    <input value="" type="text" class="form-control" name="libelle">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Marquage reine</label>
                            <select name="marquage" class="form-control">
                                <option value="Aucun" selected>Aucun</option>
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
                            <input value="" type="text" class="form-control" name="espece">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Agressivité de la colonie</label>
                            <select name="agressivite" class="form-control">
                                <option value="Faible" selected>Faible</option>
                                <option value="Moyenne">Moyenne</option>
                                <option value="Forte">Forte</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Activité</label>
                            <select name="activite" class="form-control">
                                <option value="Faible" selected>Faible</option>
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
                            <input value="" type="text" class="form-control" name="affectation_1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Affectation 2</label>
                            <input value="" type="text" class="form-control" name="affectation_2">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Notes</label>
                    <textarea value=""  class="form-control" rows="3" placeholder="Votre commentaire..." name="c_commentaire"></textarea>
                </div>



                <div class="checkbox">
                    <label>
                        <input name="reine_presente" type="checkbox"> Reine présente
                    </label>
                </div>
            </form>

        </div>

        <!-- RUCHE -->
        <div class="tab-pane active" id="tab_3-2">
            <form  name="hive" id="formHive">
                <div class="form-group">



                    <?php
                    echo "<label>Rucher</label>";
                    echo'<select name="id_apiary" class="form-control">';

                    //liste des ruchers
                    foreach ($ruchers as $value) {

                        echo "<option value='$value->id_rucher'>$value->libelle</option>";
                    }

                    echo '</select>';
                    ?>
                </div>


                <div class="form-group">
                    <label>Identifiant ruche</label>
                    <input type="text" class="form-control" name="nom" minlength="2" required>
                </div>
                <div class="form-group">
                    <label>Type de ruche</label>
                    <input name="beehive_type" type="text" class="form-control" >
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Matière</label>
                            <select name="beehive_matiere" class="form-control">
                                <option>Bois</option>
                                <option>Plastique</option>
                                <option>Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Etat</label>
                            <select name="etat" class="form-control">
                                <option value="Mauvais">Mauvais</option>
                                <option value="Moyen">Moyen</option>
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
                            <input name="nombre_corps" value="" type="text" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nb Hausses</label>
                            <input name="nombre_hausses" value="" type="text" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nb Cadres</label>
                            <input name="nombre_cadres" value="" type="text" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Orientation</label>
                        <select name="orientation" class="form-control">
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
                        <select name="exposition_soleil" class="form-control">
                            <option value="Ensoleillé">Ensoleillé</option>
                            <option value="Partiellement ensoleillé">Partiellement ensoleillé</option>
                            <option value="A l'ombre">A l'ombre</option>
                        </select>
                    </div>
                </div>         
                <div class="form-group">
                    <label>Notes</label>
                    <textarea value=""  class="form-control" rows="3" placeholder="Votre commentaire..." name="commentaire"></textarea>
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
                        <input name="vide" type="checkbox"> Ruche vide
                    </label>
                </div>

            </form>

        </div>

        <div class="box-footer">
            <a href="<?= base_url()."hive//hiveList" ?>" class="btn btn-default"><i class="fa fa-angle-left"></i> Retour</a>
            <button id="btn-save" onclick="saveHive()" class="btn btn-success pull-right"><i class="fa fa-floppy-o"></i> Sauvegarder Ruche</button>
        </div>
        <!-- /.tab-pane -->
    </div>


    <!-- /.tab-content -->


</div>



