<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$total_recent_news_home_page = $row['total_recent_news_home_page'];
	$search_title = $row['search_title'];
	$search_photo = $row['search_photo'];
	$testimonial_photo = $row['testimonial_photo'];
}
?>


<!--Slider-Area Start-->
<div class="slider-area">
  <div class="slider-item" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$search_photo; ?>)">
    <div class="bg-3" style="opacity:0.6;"></div>
    <div class="container">
      <div class="row">
        <div class="slider-text">
          <h1><?php echo $search_title; ?></h1>
        </div>
        <div class="searchbox">

          <form action="<?php echo BASE_URL.URL_SEARCH; ?>" method="post">

            <div class="col-md-3 col-sm-6">
              <input autocomplete="off" type="text" name="country" class="form-control" placeholder="Country Name">
            </div>

            <div class="col-md-3 col-sm-6">
              <input autocomplete="off" type="text" name="city" class="form-control" placeholder="City Name">
            </div>

            <div class="col-md-3 col-sm-6">

              <select data-placeholder="Choose Blood Group" class="chosen-select form-control" name="blood_group_id">
                <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_blood_group");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                  ?>
                  <option></option>
                  <option value="<?php echo $row['blood_group_id']; ?>"><?php echo $row['blood_group_name']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>

            <div class="col-md-3 col-sm-6">
              <input type="submit" value="Search Donor" name="form_search">
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!--Slider-Area End-->


<div class="blood-gallery bg-gray">
  <div class="container">
    <div class="row">
      <div class="headline">
        <h2>Blood Groups</h2>
        <div class="headline-icon" style="background-image: url(<?php echo BASE_URL; ?>img/blood.png)"></div>
      </div>
      <?php
      $statement = $pdo->prepare("SELECT * FROM tbl_blood_group");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) {
        ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="blood-item">
            <a href="<?php echo BASE_URL.URL_BLOOD_GROUPWISE_RESULT.$row['blood_group_id']; ?>"><?php echo $row['blood_group_name']; ?></a>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</div>
