<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';
require_once '../config/functions.php';
?>

<?php include('../include/general/head.php')?>

<?php include('../include/general/nav.php')?>


<div class="flex justify-center mt-28 mb-6">
<h1 class="font-bold text-4xl">Tous les films</h1>
</div>

<!-- PAGINATION -->
<?php
// Page active
if (!isset ($_GET['page']) ) {$page_number = 1; $_GET['page']= 1;
} else {$page_number = $_GET['page'];}
$pagination_number = $page_number;
// Limite de lignes par page
$limit = 16;
          // echo 'limite par page :'; var_dump($limit);
$initial_page = ($page_number-1)*$limit;
          // echo' initial page: ';var_dump($initial_page);
// Nombre total de pages nécessaires
$film_count_request = $con->prepare("SELECT ID_film FROM film"); $film_count_request->execute();
$film_count= $film_count_request->rowCount();
          // echo' Nombre de films: ';var_dump($film_count);
$page_count = ceil($film_count/$limit);
          // echo' Nombre de pages nécessaires: ';var_dump($page_count);


$filters=[];
var_dump($filters);

var_dump($_GET);
if(isset($_GET['note'])){$filters['note']=$_GET['note'];}

if(isset($_GET['sort'])){$filters['sort']=$_GET['sort'];}

$get_genre_array=[];
var_dump($get_genre_array);
if(isset($_GET['genre'])){
  $get_genre_array=$_GET['genre'];
  var_dump($get_genre_array);
  $filters['genre'] = implode(", ",$get_genre_array);
  $get_film_genre_request=$con->prepare("SELECT ID_film FROM film_genre WHERE ID_genre IN (" . $filters['genre'] . ")");$get_film_genre_request->execute();
  while($film_genre_array = $get_film_genre_request->fetch()){
        $get_film_array[]=$film_genre_array['ID_film'];
        echo($film_genre_array['ID_film']);
      }
  var_dump($get_film_array);
  $filters['film'] = implode(", ",$get_film_array);
  var_dump($filters);
}

if(isset($filters['film'])){
   if(!isset($clause)){
      $clause = " " . "WHERE ID_film IN (" . $filters['film'] .")" ;
   }else{
      $clause .= " " . " AND ID_film IN (" . $filters['film'] . ")" ;
   }
}

if(isset($filters['note'])){
   if(!isset($clause)){
      $clause = " " . "WHERE film_grade >=" . $filters['note'] ;
   }else{
      $clause .= " AND film_grade >=" . $filters['note'] ;
    }
}

if(isset($filters['sort'])){
  if($filters['sort']=="a-z"){$order_name="film_name ASC";};
  if($filters['sort']=="z-a"){$order_name="film_name DESC";};
  if($filters['sort']=="rand"){$order_name="rand()";};
  if($filters['sort']=="asc"){$order_name="ID_film ASC";};
  if($filters['sort']=="desc"){$order_name="ID_film DESC";};
  if($filters['sort']=="grade"){$order_name="film_grade DESC";};

  $order = " ORDER BY " . $order_name ;
}

if(empty($filters)){
  $film_request =$con->prepare("SELECT * FROM film LIMIT $initial_page,$limit");
}
if(isset($clause)){
  if(isset($order)){
    $film_request = $con->prepare("SELECT * FROM film $clause $order LIMIT $initial_page,$limit");
  }else{
    $film_request = $con->prepare("SELECT * FROM film $clause LIMIT $inital_page,$limit");
  }
}

if(isset($order) && !isset($clause)){
  $film_request = $con->prepare("SELECT * FROM film $order LIMIT $initial_page,$limit");
}

$film_request->execute();
var_dump($film_request);
// var_dump($_SESSION['filters']);

if(isset($_GET['page'])){
  if(!isset($_SESSION['filters'])){
      $_SESSION['filters'] =  "page=".$_GET['page'];echo 'orv';
  }else{
      $_SESSION['filters'] = "&page=" .  $_GET['page'];echo'slt';
  }
}

if(isset($_GET['note'])){
  if(!isset($_SESSION['filters'])){
      $_SESSION['filters'] =  "note=".$_GET['note'];
  }else{
      $_SESSION['filters'] .= "&note=" .  $_GET['note'];
  }
}

if(isset($_GET['genre'])){
  if(!isset($_SESSION['filters'])){
      $_SESSION['filters'] = "genre=".$_GET['genre'];
  }else{
      $_SESSION['filters'] .= "&genre=" . implode(", ",$_GET['genre']);
}
}

if(isset($_GET['sort'])){
  if(!isset($_SESSION['filters'])){
      $_SESSION['filters'] = "sort=".$_GET['sort'];
  }else{
      $_SESSION['filters'] .= "&sort=" . $_GET['sort'];
}
}
var_dump($_SESSION['filters']);
?>


<!-- SECTION CATALOGUE -->

<section class="flex justify-center">
<div class="w-[1500px] mx-12 flex gap-4">
    <!-- FILTRES -->
    <?php include('../include/general/filtre.php')?>
    <!-- PAGE -->
    <div>
        <!-- pagination -->
<div class="flex justify-center my-4  ">
    <nav aria-label="Page navigation example">
        <ul class="inline-flex items-center -space-x-px">
          <?php if($page_number > 1){?>
          <li>
            <a href="/portfolio/allosimplon/build/content/catalogue.php?page=1" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold">
              <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            </a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/catalogue.php?page=<?=$page_number-1?>" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Previous</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
            <?php } ?>
          <?php for($pagination_number = 1; $pagination_number<=$page_count; $pagination_number++){
            if($pagination_number > $page_number-3 && $pagination_number < $page_number+3){?>
          <li>
            <a href="/portfolio/allosimplon/build/content/catalogue.php?page=<?=$pagination_number?>" class="<?php if($pagination_number==$page_number){echo'text-main-light font-bold';}else{echo 'text-gray-400';} ?> px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold "><?=$pagination_number?></a>
          </li>
          <?php }} ?>
          <?php if($page_number < $page_count){ ?>
          <li>
            <a href="/portfolio/allosimplon/build/content/catalogue.php?page=<?=$page_number+1?>" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Next</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/catalogue.php?page=<?=$page_count?>" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Last</span>
              <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
    </div>

    <!-- CATALOGUE -->
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:-grid-cols-5 [&_img]:w-full [&_img]:h-full object-cover ">
            <?php
                while($film=$film_request->fetch()){
                    $photo=$film['film_photo'];
                    $name=$film['film_name'];
                    $ID=$film['ID_film'];
                    $time=$film['film_time'];
                    $date=$film['film_date'];
                    $note=$film['film_grade'];
                    $description=$film['film_description'];
                    $ID_user=$_SESSION['ID_user'];
                ?>
            <div class="group relative">
            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$ID?>"   class="cursor-pointer h-full">
                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                    <div class="relative w-full h-full flex flex-col justify-between">
                        <p class="font-bold text-xl cursor-dark"><?=$date?></p>
                        <?php
                            isFilmFav($ID,$ID_user);
                        ?>
                        <div>
                            <div class="flex justify-start">
                                <h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$name?></h2>
                            </div>
                            <div class="flex justify-start">
                                <p class="font-normal cursor-dark"><?php echo substr($description,0,200),'...' ?>
                                </p>
                            </div>
                            <div class="flex justify-between h-auto mt-4 text-center">
                                <div class="flex justify-start align-bottom">
                                    <?=$time?>min
                                </div>
                                <div class="flex justify-end">
                                    <?php Stars($note) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="" src="/portfolio/allosimplon/build/upload/film/<?=$photo?>" alt="<?=$name?>">
                </a>
            </div>
            <?php } ?>
        </div>
    <!-- pagination -->
    <div class="flex justify-center my-4  ">
<nav aria-label="Page navigation example">
    <ul class="inline-flex items-center -space-x-px">
      <?php if($page_number > 1){?>
      <li>
        <a href="/portfolio/allosimplon/build/content/catalogue.php?page=1" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold">
          <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        </a>
      </li>
      <li>
        <a href="/portfolio/allosimplon/build/content/catalogue.php?page=<?=$page_number-1?>" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
          <span class="sr-only">Previous</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </a>
      </li>
        <?php } ?>
      <?php for($pagination_number = 1; $pagination_number<=$page_count; $pagination_number++){
        if($pagination_number > $page_number-3 && $pagination_number < $page_number+3){?>
      <li>
        <a href="/portfolio/allosimplon/build/content/catalogue.php?page=<?=$pagination_number?>" class="<?php if($pagination_number==$page_number){echo'text-main-light font-bold';}else{echo 'text-gray-400';} ?> px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold "><?=$pagination_number?></a>
      </li>
      <?php }} ?>
      <?php if($page_number < $page_count){ ?>
      <li>
        <a href="/portfolio/allosimplon/build/content/catalogue.php?page=<?=$page_number+1?>" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
          <span class="sr-only">Next</span>
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </a>
      </li>
      <li>
        <a href="/portfolio/allosimplon/build/content/catalogue.php?page=<?=$page_count?>" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
          <span class="sr-only">Last</span>
          <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </a>
      </li>
      <?php } ?>
    </ul>
  </nav>
</div>

</section>



<?php include('../include/general/footer.php')?>
