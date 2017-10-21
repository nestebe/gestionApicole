

<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Ruches occupées</span>
                <span class="info-box-number"><?=$nb_ruche_pleine?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-flag-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Ruches Vides</span>
                <span class="info-box-number"><?=$nb_ruche_vide?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-cubes"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Rucher(s)</span>
                <span class="info-box-number"><?=$nb_rucher?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

</div><!-- /.row -->




<div class="row">
    <div class="col-md-6">
        
        <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Etat des ruches</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">


        <div class="row">
            <div class="col-md-8">
                <div class="chart-responsive">
                    <canvas style="width: 273px; height: 155px;" width="273" id="pieChart" height="155"></canvas>
                </div>
                <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Mauvais </li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Moyen</li>
                    <li><i class="fa fa-circle-o text-green"></i> Bon</li>
                    <li><i class="fa fa-circle-o text-blue"></i> Excellent</li>
                </ul>
            </div>
            <!-- /.col -->
        </div>




    </div><!-- /.box-body -->
</div><!-- /.box -->
        
    </div>    


    <div class="col-md-6">

        <div class="box">
    <div class="box-header">
        <h3 class="box-title">Actus</h3>
                <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
<ul class="list-unstyled">
<li>Non disponible</li>
<!--                <li>Version 0.9.0
                  <ul>
                    <li>Phasellus iaculis neque</li>
                    <li>Gestion des ruchers</li>
                    <li>Gestion des Ruches</li>
                    <li>Gestion des Visites</li>
                    <li>Tableau de bord</li>
                  </ul>
                </li>-->
  
              </ul>
        
    </div><!-- /.box-body -->
</div><!-- /.box -->

    </div>
</div>






