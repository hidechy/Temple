<?php
$ex_phpself = explode("/" , $_SERVER['PHP_SELF']);
array_pop($ex_phpself);
$public_path = implode("/" , $ex_phpself);
?>

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>神社リスト</title>

    <style>
    *{box-sizing: border-box; margin: 0; padding: 0;}
    .content{margin: 0 auto; padding: 40px;}
    .modal{display: none; height: 100vh; position: fixed; top: 0; width: 100%;}
    .modal__bg{background: rgba(0,0,0,0.8); height: 100vh; position: absolute; width: 100%;}
    .modal__content{background: #fff; left: 50%; padding: 40px; position: absolute; top: 50%; transform: translate(-50%,-50%); width: 60%;}

    .year_div {border: 3px dotted #cccccc; margin: 10px; padding: 10px;}
    .year_bg {background: #eeeeee; margin: 5px; padding: 5px; font-weight: bold;}
    .date_div {font-weight: bold; margin: 5px; padding: 5px; cursor: pointer; float: left;}
    .img_td {text-align: center;}
    .width100 {width: 100px; margin: 5px;}
    .rotate90 {transform: rotate(90deg); width: 100px; margin: 30px -10px;}
    .display_none {display: none;}

    #modal_img {text-align: center;}
    .pointer {cursor: pointer;}

    .station_div {padding: 15px 0px 0px 10px; font-size: 12px; float: left;}

    .font12 {font-size: 12px;}
    </style>

    <script src="{{ $public_path }}/js/jquery-3.3.1.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

  </head>
  <body>

    <div class="font12" style="padding-left: 20px;">日付をクリックすると画像が表示されます。</div>

    <?php
    foreach ($photolist as $year => $v){
      echo "<div class='year_div'>";
      echo "<div class='year_bg'>" . $year . "</div>";
      foreach ($v as $date => $v2){
        echo "<div class='date_div' onclick='javascript:openPhotoDiv(\"" . $date . "\")'>";
        echo $date;
        echo "　";

        if (isset($explanation[$date]['temple'])){
          if(trim($explanation[$date]['temple']) != ""){
            echo $explanation[$date]['temple'];
          }
        }

        if (isset($explanation[$date]['memo'])){
          if(trim($explanation[$date]['memo']) != ""){
            echo " ＆ " . $explanation[$date]['memo'];
          }
        }

        echo "</div>";
        if (isset($explanation[$date]['station'])){
          if (isset($explanation[$date]['address'])){
            echo "<div class='station_div'>最寄り駅：" . $explanation[$date]['station'] . "　住所：" . $explanation[$date]['address'] . "</div>";
          }
        }

        echo "<br style='clear: both;'>";
        echo "<input type='hidden' id='openPhotoStatus_" . $date . "' value='close'>";
        echo "<div class='display_none' id='photoDiv_" . $date . "'></div>";
      }
      echo "</div>";
    }
    ?>

    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <div id="arrow_div">
            <button class="btn-dark" id="btn_back" onclick="javascript:photo_change('back');"> < </button>
            <button class="btn-dark" id="btn_next" onclick="javascript:photo_change('next');"> > </button>
            &nbsp;&nbsp;
            <span class="font12">←→ボタンでも変更可能</span>
        </div>
        <div id="modal_img"></div>
      </div>
    </div>

    <div class='display_none'>
    <input type="text" id="selected_date">
    <input type="text" id="selected_photo">
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>

    //写真表示エリアを開く
    function openPhotoDiv(date){
      if ($("#openPhotoStatus_" + date).val() == "close"){

        //写真呼び出し（写真が呼び出されていない場合）
        if ($("#photoDiv_" + date).html() == ""){
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
            url: '{{ $appUrl }}/callphoto',
            type: 'POST',
            data: {
              _token: CSRF_TOKEN ,
              'date' : date
            },
            success: function (data) {
              if (data != ""){
                $("#photoDiv_" + date).html(data);
              }
            }
          });
        }

        $("#openPhotoStatus_" + date).val("open");
        $("#photoDiv_" + date).slideDown();
      }else{
        $("#openPhotoStatus_" + date).val("close");
        $("#photoDiv_" + date).slideUp();
      }
    }

    //モーダルを呼び出す
    function openModal(date , imgsrc , sizeClass){

      $("#selected_date").val(date);
      $("#selected_photo").val(imgsrc);

      if (sizeClass == "rotate90"){
        $("#modal_img").html("<img src='" + imgsrc + "' style='transform: rotate(90deg); width: 600px; margin: 50px -10px;'>");
      }else{
        $("#modal_img").html("<img src='" + imgsrc + "' style='width: 350px;'>");
      }

      //ボタンの制御
      btnBehaviour_back(date , imgsrc);
      btnBehaviour_next(date , imgsrc);

      $('.js-modal').fadeIn();
      return false;
    }

    $('.js-modal-close').on('click',function(){
      $('.js-modal').fadeOut();
      return false;
    });

    function getPhotoNo(date , imgsrc){
      let photo_files = ($("#image_files-" + date).val()).split("|");
      return $.inArray(imgsrc , photo_files);
    }

    function getLastPhotoFlag(date , imgsrc){
      let photo_files = ($("#image_files-" + date).val()).split("|");
      let photo_no = getPhotoNo(date , imgsrc);
      return (photo_no == (photo_files.length - 1)) ? 1 : 0;
    }

    //写真の切り替え
    function photo_change(flag){
      let date = $("#selected_date").val();

      let imgsrc = $("#selected_photo").val();

      let photo_no = getPhotoNo(date , imgsrc);

      let photo_files = ($("#image_files-" + date).val()).split("|");
      let sizeClass = ($("#size_class-" + date).val()).split("|");

      let call_photo_no = 0;
      switch (flag){
        case "back":
          call_photo_no = (photo_no - 1);
          break;
        case "next":
          call_photo_no = (photo_no + 1);
          break;
      }

      if (call_photo_no < 0){return false;}
      if (call_photo_no > photo_files.length - 1){return false;}

      if (sizeClass[call_photo_no] == "rotate90"){
        $("#modal_img").html("<img src='" + photo_files[call_photo_no] + "' style='transform: rotate(90deg); width: 600px; margin: 50px -10px;'>");
      }else{
        $("#modal_img").html("<img src='" + photo_files[call_photo_no] + "' style='width: 350px;'>");
      }

      $("#selected_photo").val(photo_files[call_photo_no]);

      //ボタンの制御
      btnBehaviour_back(date , photo_files[call_photo_no]);
      btnBehaviour_next(date , photo_files[call_photo_no]);
    }

    //戻るボタンの制御
    function btnBehaviour_back(date , imgsrc){
      if (getPhotoNo(date , imgsrc) == 0){
        $("#btn_back").prop("disabled", true);
        $("#btn_back").removeClass("btn-dark");
        $("#btn_back").addClass("btn-outline-dark");
      }else{
        $("#btn_back").prop("disabled", false);
        $("#btn_back").removeClass("btn-outline-dark");
        $("#btn_back").addClass("btn-dark");
      }
    }

    //進むボタンの制御
    function btnBehaviour_next(date , imgsrc){
      if (getLastPhotoFlag(date , imgsrc) == 1){
        $("#btn_next").prop("disabled", true);
        $("#btn_next").removeClass("btn-dark");
        $("#btn_next").addClass("btn-outline-dark");
      }else{
        $("#btn_next").prop("disabled", false);
        $("#btn_next").removeClass("btn-outline-dark");
        $("#btn_next").addClass("btn-dark");
      }
    }

    $('html').keyup(function(e){
      switch(e.which){
        case 37: // Key[←]
          photo_change('back');
          break;
        case 39: // Key[→]
          photo_change('next');
          break;
      }
    });

    </script>

    <br><br><br><br><br>

  </body>
</html>
