<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Mes ruchers</h3>
        <div class="box-tools pull-right">
            <a href="<?=base_url()."hive/newhive"?>" class="btn btn-success btn-sm">Nouvelle Ruche</a>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="test" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ruche</th>
                    <th>Type de ruche</th>
                    <th>Etat</th>
                    <th>Date création</th>
                </tr>
            </thead>
            <tbody>

                <?php
               
                //liste des ruchers
                foreach ($list_hive as $value) {
                    $datec = new DateTime($value->creation_date);
                    $url = base_url()."hive/editHive/$value->id_beehive";
   
                    echo "<tr>";
                    echo "<td><a href='$url' class='btn btn-sm btn-primary'><i class='fa fa-edit'></i></a> ".$value->nom."</td>";
                    echo "<td> ".$value->beehive_type."</td>";  
                    echo "<td> ".$value->etat."</td>";  
                    echo "<td> ".$datec->format('d/m/Y')."</td>";
                    echo "</tr>";
      
                }
                ?>
                


            </tbody>

        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
