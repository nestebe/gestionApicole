<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Mes Visites</h3>
        <div class="box-tools pull-right">
            <a href="<?= base_url() . "inspection/newinspection" ?>" class="btn btn-success btn-sm">Nouvelle Ruche</a>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="test" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ruche</th>
                    <th>Date visite</th>
                    <th>Activite</th>
                </tr>
            </thead>
            <tbody>

                <?php

                //liste des visites
                foreach ($list_inspection as $value) {

                    $query_ruche = $this->db->query("SELECT * FROM ".$this->db->dbprefix('beehive')." WHERE id_user =  " . $_SESSION['id_user'] . " AND id_beehive = " . $value->id_ruche);
                    $ruche = $query_ruche->row();
                    
                    if (($query_ruche->num_rows() == 0)) {
                        continue;
                    }

                    $query_rucher = $this->db->query("SELECT * FROM ".$this->db->dbprefix('apiary')." WHERE id_user =  " . $_SESSION['id_user'] . " AND id_rucher = " . $ruche->id_apiary);
                    $rucher = $query_rucher->row();


                    if ($query_rucher->num_rows() == 0) {
                        continue;
                    }

                    $date_visite = new DateTime($value->date_visite);
                    $url = base_url() . "inspection/editInspection/$value->id_inspection";

                    echo "<tr>";
                    echo "<td><a href='$url' class='btn btn-sm btn-primary'><i class='fa fa-edit'></i></a> " . $ruche->nom . "( " . $rucher->libelle . " )</td>";
                    echo "<td> " . $date_visite->format('d/m/Y') . "</td>";
                    echo "<td> " . $value->activite . "</td>";
                   
                    echo "</tr>";
                }
                ?>



            </tbody>

        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
