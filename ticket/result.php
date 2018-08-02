<!DOCTYPE html>
<html>
<!-- Author information
* html, php, css, javascript
*   written by hepheir@gmail.com
*
* site designed by
*   dfc7936@naver.com & hepheir@gmail.com
*
-->
  <head>
    <meta charset="utf-8">
		<meta name="author" content="hepheir">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="../css/ticket_result.css">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>예매확인</title>
  </head>
  <body>
    <?php
    if (empty($_GET['part']) && empty($_GET['seat']) || $_GET['part'] == 0 && empty($_GET['seat'])) {
      echo '<script>alert("뭐라도 좀 고르고 예매하세요.");window.location.replace("../ticket/?part=0");</script>';
    }
    else if (empty($_GET['part']) || $_GET['part'] == 0) {
      echo '<script>alert("시간을 선택하시지 않으셨습니다.");window.location.replace("../ticket/?part=0");</script>';
    }
    else if (empty($_GET['seat'])) {
      echo '<script>alert("좌석을 선택하시지 않으셨습니다.");window.location.replace("../ticket/?part='.$_GET['part'].'");</script>';
    }
    if (file_exists('../data/seat/part_'.$_GET['part'].'/'.$_GET['seat'])) {
      echo '<script>alert("저런.. 그 짧은 찰나의 순간에, 다른 누군가가 먼저 예약한 모양입니다. 죄송합니다.");window.location.replace("../ticket");</script>';
    }
    fopen('../data/seat/part_'.$_GET['part'].'/'.$_GET['seat'], 'x');
    echo '<script>alert("예매를 진행합니다. 예매하는 도중에 뒤로가기나 새로고침을 누르지 말아주세요.");</script>';
    ?>
    <div id="bodyWrap">
      <div id="containerWrap">
        <h1 class="bold">예매 확인</h1>
        <div id="descWrap" class="card_1">
          <form action="confirm.php" method="post">
            <?php
              echo '<input type="hidden" name="part" value="'.$_GET['part'].'"><input type="hidden" name="seat" value="'.$_GET['seat'].'">';
              echo '<h2 class="card_2">선택하신 좌석은 '.$_GET['part'].'부, '.$_GET['seat'].' 입니다.</h2>';
            ?>
            <div id="formWrap" class="card_2">
              <h3 class="bold">학번과 이름을 입력해주세요.</h3>
              <p>
                <label for="id">학번: </label>
                <input type="text" id="id" name="id"> &nbsp;
                <label for="name">이름: </label>
                <input type="text" id="name" name="name"/>
              </p>
              <h3 class="bold">예매 정보 확인 및 수정시 필요한 비밀번호를 입력해주세요.</h3>
              <p>
                <label for="id">비밀번호: </label>
                <input type="password" id="pw" name="pw">
              </p>
              <h3 class="bold">예매 확인을 위한 연락수단을 입력해주세요. (싫으면 안 써도 되지만...)</h3>
              <p><input type="text" id="info" name="info" value="이메일, 휴대폰 등..."/></p>
              <br>
              <input id="confirm" class="hidden" type="submit"/><label class="submit" for="confirm">확인</label>
              <label class="submit" for="cancel">취소</label>
            </div>
          </div>
        </form>
        <form action="cancel.php" method="post">
          <?php
            echo '<input type="hidden" name="part" value="'.$_GET['part'].'"><input type="hidden" name="seat" value="'.$_GET['seat'].'">';
          ?>
          <input id="cancel" class="hidden" type="submit"/>
        </form>
      </div>
    </div>
  </body>
</html>
