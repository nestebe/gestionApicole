


<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Mes ruchers</h3>
        <div class="box-tools pull-right">
            <a href="<?=base_url()."apiary/newApiary"?>" class="btn btn-success btn-sm">Nouveau Rucher</a>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="test" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Rucher</th>
                    <th>Nombre ruches</th>
                    <th>Date création</th>
                </tr>
            </thead>
            <tbody>

                <?php
                
                //liste des ruchers
                foreach ($list_apiary as $value) {
                    $datec = new DateTime($value->creation_date);
                    $url = base_url()."apiary/editApiary/$value->id_rucher";
       
                    echo "<tr>";
                    echo "<td><a href='$url' class='btn btn-sm btn-primary'><i class='fa fa-cubes'></i></a> ".$value->libelle."</td>";
                    echo "<td> ".$value->nombre_ruches."</td>";
                    echo "<td> ".$datec->format('d/m/Y')."</td>";
                    echo "</tr>";
      
                }
                ?>
                


            </tbody>

        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
