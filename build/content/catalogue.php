<?php session_start();
require_once '../config/connexion.php';
require_once '../config/functions.php';
include('../include/general/head.php');
include('../include/general/nav.php')?>


<div class="flex justify-center mt-20 mb-6">
<h1 class="font-bold text-2xl lg:text-4xl">Tous les films</h1>
</div>

<!-- PAGINATION -->
<?php
// Page active
if (!isset ($_GET['page']) ){$page_number_temp = 1; $_GET['page']= 1;
}else{$page_number_temp=$_GET['page'];}
$page_number=$page_number_temp;
$pagination_number = $page_number;
// Limite de lignes par page
$limit = 8;
          // echo 'limite par page :'; var_dump($limit);
$initial_page = ($page_number-1)*$limit;
$limit_request=$initial_page.",".$limit;
          // echo' initial page: ';var_dump($initial_page);
          $film_count_request=$con->prepare("SELECT ID_film FROM film");$film_count_request->execute();
          $film_count= $film_count_request->rowCount();
          // echo' Nombre de films: ';var_dump($film_count);
          $page_count = ceil($film_count/$limit);
          // echo' Nombre de pages nécessaires: ';var_dump($page_count);


$filters=[];
// echo'filters:';var_dump($filters);

// echo'get:';var_dump($_GET);
// var_dump($filters);

if(isset($_GET['note'])){$filters['note']=$_GET['note'];}

if(isset($_GET['sort'])){$filters['sort']=$_GET['sort'];}

if(isset($_GET['genre'])){$filters['genre']=$_GET['genre'];}

if(isset($_GET['search'])){$filters['search']=$_GET['search'];}

if(isset($_GET['letter'])){$filters['letter']=$_GET['letter'];}

// var_dump($filters);

if(isset($_GET['genre'])){
  $get_genre_array=$_GET['genre'];
  // var_dump($get_genre_array);
  $genre_count=count($get_genre_array);
  // var_dump($genre_count);
  foreach($get_genre_array as $ID_genre){
    $request=$con->prepare("SELECT ID_film FROM film_genre WHERE ID_genre = $ID_genre");$request->execute();
    $fetch=$request->fetchAll(PDO::FETCH_COLUMN);
    $get_film_array[]=$fetch;
}

// var_dump($get_film_array);
$bool= [];
for($i=0;$i<$genre_count;$i++){
  $common_films= array_intersect($get_film_array[0],$get_film_array[$i]);
  if(empty($common_films)){$bool[$i]="false";}else{$bool[$i]="true";}
  // var_dump($common_films);
}
// var_dump($bool);
if($genre_count>1){
// var_dump($common_films);

  $filters['film'] = implode(", ",$common_films);
}else{
  $filters['film'] = implode(", ",$get_film_array[0]);
}
  // var_dump($filters);
}
// if(isset($get_genre_array)){
// echo'genre_array:';var_dump($get_genre_array);}
// var_dump($filters);
// var_dump($_SESSION['filters']);

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

if(isset($filters['search'])){
  if(!isset($clause)){
    $clause = " WHERE SOUNDEX(film_name) = SOUNDEX ('".$filters['search']."') OR film_name LIKE ('%".$filters['search']."%')";
  }else{
    $clause .= " AND SOUNDEX(film_name) = SOUNDEX ('".$filters['search']."') OR film_name LIKE ('%".$filters['search']."%')";
  }
}

if(isset($filters['letter'])){
  if(!isset($clause)){
    $clause = " WHERE film_name LIKE ('".$filters['letter']."%')";
  }else{
    $clause .= " AND film_name LIKE ('".$filters['letter']."%')";
  }
}

if(isset($filters['sort'])){
  if($filters['sort']=="a-z"){$order_name="film_name ASC";};
  if($filters['sort']=="z-a"){$order_name="film_name DESC";};
  if($filters['sort']=="rand"){$order_name="rand()";};
  if($filters['sort']=="asc"){$order_name="ID_film ASC";};
  if($filters['sort']=="desc"){$order_name="ID_film DESC";};
  if($filters['sort']=="grade"){$order_name="film_grade DESC";};
  if($filters['sort']=="date"){$order_name="film_date DESC";};
  if($filters['sort']=="fav"){$order_name="likes DESC";};
  $order = " ORDER BY " . $order_name ;
}

if(empty($filters)){
  $film_request =$con->prepare("SELECT * FROM film LIMIT $initial_page,$limit");
  // echo 'là30';
}
if(isset($clause)){
  if(isset($order)){
    $film_request = $con->prepare("SELECT * FROM film $clause $order LIMIT $initial_page,$limit");
    // echo 'là10';
  }else{
    $film_request = $con->prepare("SELECT * FROM film $clause LIMIT $limit_request");
    // echo 'là20';
  }
}

if(isset($order) && !isset($clause)){
  $film_request = $con->prepare("SELECT * FROM film $order LIMIT $initial_page,$limit");
  // echo'là40';
}



if(isset($bool) && in_array("false",$bool)){
  echo "<script> alert (' Aucun film correspondant ! ' ) ;</script>" ;
  echo "<script> window.location.replace(document.referrer) ; </script>";
}else{
// var_dump($filters);
// var_dump($film_request);
$film_request->execute();
}


// var_dump($film_request);
// var_dump($_SESSION['filters']);

if(isset($_GET['page'])){
  if(!isset($_SESSION['filters'])){
      $_SESSION['filters'] =  "page=".$_GET['page'];
  }else{
      $_SESSION['filters'] = "page=" .  $_GET['page'];
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
      $_SESSION['filters'] = "genre[]=".$_GET['genre'];
  }else{
      $_SESSION['filters'] .= "&genre[]=" . implode("&genre[]=",$_GET['genre']);
}
}

if(isset($_GET['sort'])){
  if(!isset($_SESSION['filters'])){
      $_SESSION['filters'] = "sort=".$_GET['sort'];
  }else{
      $_SESSION['filters'] .= "&sort=" . $_GET['sort'];
}
}

if(isset($_GET['search'])){
  if(!isset($_SESSION['filters'])){
    $_SESSION['filters'] = "search=".$_GET['search'];
  }else{
    $_SESSION['filters'] .= "&search=".$_GET['search'];
  }
}

if(isset($_GET['letter'])){
  if(!isset($_SESSION['filters'])){
    $_SESSION['filters'] = "letter=".$_GET['letter'];
  }else{
    $_SESSION['filters'] .= "&letter=".$_GET['letter'];
  }
}
// var_dump($_SESSION['filters']);

if(empty($_SESSION['filters'])){
  $url = "/portfolio/allosimplon/build/content/catalogue.php?";
}else{
  $url = "/portfolio/allosimplon/build/content/catalogue.php?" . $_SESSION['filters']  . "&";
}
// var_dump($url);


?>


<!-- SECTION CATALOGUE -->
<button class="px-4 py-2 rounded-lg uppercase flex mx-auto bg-main-light text-gray-50 md:hidden" onclick="toggleFilters(filtres)">
  Parcourir les filtres
</button>

<script>
      function toggleFilters(menu) {
    menu.classList.toggle('hidden')
    }
</script>

<section class="flex justify-center">
<div class="w-[1500px] mx-12 md:flex gap-4">
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
            <a href="<?=$url?>page=1" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold">
              <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            </a>
          </li>
          <li>
            <a href="<?=$url?>page=<?=$page_number-1?>" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Previous</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
            <?php } ?>
          <?php for($pagination_number = 1; $pagination_number<=$page_count; $pagination_number++){
            if($pagination_number > $page_number-3 && $pagination_number < $page_number+3){?>
          <li>
            <a href="<?=$url?>page=<?=$pagination_number?>" class="<?php if($pagination_number==$page_number){echo'text-main-light font-bold';}else{echo 'text-gray-400';} ?> px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold "><?=$pagination_number?></a>
          </li>
          <?php }} ?>
          <?php if($page_number < $page_count){ ?>
          <li>
            <a href="<?=$url?>page=<?=$page_number+1?>" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
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

<?php if(isset($_GET['sort'])){
  if($_GET['sort']=="a-z"||$_GET['sort']=="z-a"){?>
<div class="hidden text-lg justify-center gap-5 mb-2 lg:flex [&>a]:text-main-light">
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="A"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=A">A</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="B"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=B">B</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="C"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=c">C</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="D"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=D">D</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="E"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=E">E</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="F"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=F">F</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="G"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=G">G</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="H"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=H">H</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="I"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=I">I</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="J"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=J">J</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="K"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=K">K</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="L"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=L">L</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="M"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=M">M</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="N"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=N">N</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="O"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=O">O</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="P"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=P">P</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="Q"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=Q">Q</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="R"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=R">R</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="S"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=S">S</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="T"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=T">T</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="U"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=U">U</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="V"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=V">V</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="W"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=W">W</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="X"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=X">X</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="Y"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=Y">Y</a>
  <a class="hover:text-main-hover hover:underline decoration-main-light <?php if(isset($_GET['letter']) && $_GET['letter']=="Z"){echo 'underline text-main-hover';} ?>" href="<?=$url?>letter=Z">Z</a>
</div>
<?php }} ?>
    <!-- CATALOGUE -->
        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:-grid-cols-5 [&_img]:w-full [&_img]:h-full object-cover ">
            <?php
                while($film=$film_request->fetch()){
                    $photo=$film['film_photo'];
                    $name=$film['film_name'];
                    $ID=$film['ID_film'];
                    $time=$film['film_time'];
                    $date=$film['film_date'];
                    $note=$film['film_grade'];
                    $likes=$film['likes'];
                    $description=$film['film_description'];
                    if(isset($_SESSION['ID_user'])){$ID_user=$_SESSION['ID_user'];}
                ?>
            <div class="group relative">
            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$ID?>" class="h-full cursor-pointer overflow-hidden">
                            <!-- OVERLAY!!! -->
                            <div class="hidden lg:block z-50 absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$date?></p>
                                    <?php
                                        if(isset($_SESSION['ID_user'])){isFilmFav($ID,$_SESSION['ID_user'],$likes);}else{ShowFakeFav($likes);}
                                    ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-xl mb-2"><?=substr($name,0,40)?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($description,0,150),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$time?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($note,$ID);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="h-96 md:h-[400px] md:max-h-[50vh]  mx-auto w-fit relative">
                                    <div class="block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden bg-main-light "><?=$date?></div>
                                    <div class="block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($ID,$_SESSION['ID_user'],$likes);}else{ShowFakeFav($likes);}?></div>
                                    <div class="block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto lg:group-hover:hidden"><?php Stars($note,$ID);?></div>
                                    <img src="/portfolio/allosimplon/build/upload/film/<?=$photogi?>" class="h-full">
                                </div>
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
            <a href="<?=$url?>page=1" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold">
              <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            </a>
          </li>
          <li>
            <a href="<?=$url?>page=<?=$page_number-1?>" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Previous</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
            <?php } ?>
          <?php for($pagination_number = 1; $pagination_number<=$page_count; $pagination_number++){
            if($pagination_number > $page_number-3 && $pagination_number < $page_number+3){?>
          <li>
            <a href="<?=$url?>page=<?=$pagination_number?>" class="<?php if($pagination_number==$page_number){echo'text-main-light font-bold';}else{echo 'text-gray-400';} ?> px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold "><?=$pagination_number?></a>
          </li>
          <?php }} ?>
          <?php if($page_number < $page_count){ ?>
          <li>
            <a href="<?=$url?>page=<?=$page_number+1?>" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
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
