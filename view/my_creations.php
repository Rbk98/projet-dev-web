<?php $title = 'Mes creations';
    require_once('./Model/bookModel.php');
    ob_start();
?>

    <div class="container my-2">
        <h2 class="h2_title my-2">Mes créations</h2>
        <hr class="hr_content"/>
    </div>

<?php if(isset($_SESSION['nickname']) && isset($_SESSION['role']))
{
    if(!empty($_SESSION['nickname']) && !empty($_SESSION['role']))
    {   
        if($_SESSION['role'] ==1)
        {
            //s'il n'y a pas encore d'histoire créée
            if(getStartedCreation()->rowCount()==0 && getFinishedCreation()->rowCount()==0)
            {?>
                <div class="container my-5"> 
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <div class="card text-center" style="width: 30rem;">                
                                <div class="card-body">
                                    <i class="fa fa-book fa-2x mb-4" style="color:#0883cd;"></i>
                                    <p class="mb-4">Vous n'avez pour l'instant aucune histoire de créée. </br>Commencez à écrire votre première histoire dès maintenant </p>
                                    <a type="sumbit" class="btn btn-success" href="create_story.php">Créer mon histoire</a>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            <?php }
            else {
                //s'il y a des histoires en cours de création
                if(getStartedCreation()->rowCount()!=0)
                { ?>
                    <div class="container mb-3">
                        <h4>Histoire(s) en cours de création</h4>
                        <hr class="hr_line"/>
                    </div>
                    <?php
                    $result=getStartedCreation();
                    $result=$result->fetchAll();
                    foreach($result as $ligne)
                    { ?>
                        <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
                            <div class="col-2">
                                <div class="card h-75">
                                    <img src="public/images/<?= $ligne['image']?>" class="card-img-top py-3" alt="book_img">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$result['title']?></h5>
                                        <a href="index.php?action=modifier-histoire" class="btn btn-primary px-2">Continuer
                                            l'édition</a>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-2">
                            <div class="card h-75">
                                 <div class="card-body">
                                    <a href="index.php?action=creer-histoire"><i class="bi bi-plus-circle" style="font-size:100px; "></i></a>
                                    <h6 class="card-title mt-5 d-flex justify-content-center">Créer une nouvelle histoire</h6>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
                //s'il y a des histoires en cours de création ET des histoires finies
                if(getFinishedCreation()->rowCount()!=0 && getStartedCreation()->rowCount()!=0)
                { ?>
                    <!--<div class="mb-2 mx-2">
                        <hr class="hr_content"/>
                    </div>-->
                <?php }
                //s'il y a des histoires finies
                if (getFinishedCreation()->rowCount()!=0)
                { ?>
                    <div class="container m-3">
                        <h4>Histoires terminées</h4>
                        <hr class="hr_line"/>
                    </div>
                    <?php
                    $result=getFinishedCreation();
                    $result=$result->fetchAll();
                    foreach($result as $ligne)
                    { ?>
                        
                        <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
                            <div class="col-3 mb-5">
                                <div class="card h-100">
                                    <img src="public/images/<?= $ligne['image']?>" class="card-img-top p-3" alt="book_img">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$ligne['title']?></h5>
                                        <span class="badge bg-info text-dark"><?=$ligne['genre']?></span>
                                        <p class="card-text"><?=$ligne['summary']?></p>
                                        <?php
                                        if($ligne['state']==2)
                                        { ?>
                                            <a href="index.php?action=mon-histoire&1" class="btn px-2 mb-2 btn-success">
                                                <i class="bi bi-eye"></i> Publié</a>
                                            <a href="index.php?action=info-histoire" class="btn btn-light px-2">
                                                <i class="bi bi-graph-up"></i> Voir mes statistiques</a>
                                        <?php }
                                        else if ($ligne['state']==3){?>
                                            <a href="index.php?action=info-histoire" class="btn btn-secondary px-2">
                                            <i class="bi bi-eye-slash"></i> Non publié</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
            }
        }
    }
}


$content = ob_get_clean();
require('base.php');?>