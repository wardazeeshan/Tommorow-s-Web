<?php
include 'connect.php';
include 'nav.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
    <title>forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="blog.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<!-- Modal -->
<div id="ReplyModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Reply Question</h4>
      <button type="button" class="close" onclick="closeModal()">&times;</button>
    </div>
    <div class="modal-body">
      <form name="frm1" method="post">
        <input type="hidden" id="commentid" name="Rcommentid">
        <div class="forum-form-group">
          <label for="usr">Write your name:</label>
          <input type="text" name="Rname" required>
        </div>
        <div class="forum-form-group">
          <label for="comment">Write your reply:</label>
          <textarea rows="5" name="Rmsg" required></textarea>
        </div>
        <input type="button" id="btnreply" name="btnreply" class="forum-btn" value="Reply">
      </form>
    </div>
  </div>
</div>

<div class="forum-container">
  <div class="forum-panel">
    <div class="forum-panel-body">
      <h3>Write a Feedback.</h3>
      <br>
      <form name="frm" method="post">
        <input type="hidden" id="commentid" name="Pcommentid" value="0">
        <div class="forum-form-group">
          <label for="usr">Write your name:</label>
          <input type="text" name="name" required>
        </div>
        <div class="forum-form-group">
          <label for="comment">Write your question:</label>
          <textarea rows="5" name="msg" required></textarea>
        </div>
        <input type="button" id="butsave" name="save" class="forum-btn" value="Send">
      </form>
    </div>
  </div>

  <div class="forum-panel">
    <div class="forum-panel-body">
      <h4>Recent Reviews.</h4>
      <table class="forum-table" id="MyTable">
        <tbody id="record">
        </tbody>
      </table>
    </div>
  </div>
</div>
    <!--FOOTER SECTION-->
    <div class="footer">
    <div class="shar">
        <a href="#" class="fab fa-facebook"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
    </div>
    <div class="links">
        <a href="home.php">Home</a>
        <a href="#about">About Us</a>
        <a href="menu.php">Menu</a>
        <a href="product.php">Products</a>
        <a href="blog.php">Reviews</a>
    </div>
    <div class="credits">
        Created by <span>Warda Zeeshan</span> || all rights rerved.
    </div>
</div>
<!--FOOTER SECTION-->
<!---------------------------script starts------------------------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
// Function to load data
function LoadData() {
    $.ajax({
        url: 'view.php',
        type: "POST",
        dataType: 'json',
        success: function(data) {
            $('#MyTable tbody').empty();
            for (var i = 0; i < data.length; i++) {
                var commentId = data[i].id;
                if (data[i].parent_comment == 0) {
                    var row = $('<tr><td><b><img src="avatar.jpg" width="30px" height="30px" />' + data[i].student + ' :<i> ' + data[i].date + ':</i></b></br><p style="padding-left:80px">' + data[i].post + '</br><a data-id="' + commentId + '" title="Add this item" class="open-ReplyModal" href="#">Reply</a>' + '</p></td></tr>');
                    $('#record').append(row);
                    for (var r = 0; (r < data.length); r++) {
                        if (data[r].parent_comment == commentId) {
                            var comments = $('<tr><td style="padding-left:80px"><b><img src="avatar.jpg" width="30px" height="30px" />' + data[r].student + ' :<i> ' + data[r].date + ':</i></b></br><p style="padding-left:40px">' + data[r].post + '</p></td></tr>');
                            $('#record').append(comments);
                        }
                    }
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus + ' - ' + errorThrown);
        }
    });
}

// Interval to load data every 2 seconds
var myVar = setInterval(LoadData, 2000);

// Show the modal
$(document).on("click", ".open-ReplyModal", function() {
    var commentid = $(this).data('id');
    $(".modal-body #commentid").val(commentid);
    $('#ReplyModal').show();
});

// Close the modal
function closeModal() {
    $('#ReplyModal').hide();
}

// Ensure event handlers are attached only once
$(document).ready(function() {
    // Event handler for post submission
    $('#butsave').on('click', function() {
        $("#butsave").attr("disabled", "disabled");
        var id = document.forms["frm"]["Pcommentid"].value;
        var name = document.forms["frm"]["name"].value;
        var msg = document.forms["frm"]["msg"].value;
        if (name != "" && msg != "") {
            $.ajax({
                url: "save.php",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    msg: msg,
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#butsave").removeAttr("disabled");
                        document.forms["frm"]["Pcommentid"].value = "";
                        document.forms["frm"]["name"].value = "";
                        document.forms["frm"]["msg"].value = "";
                        LoadData();
                    } else if (dataResult.statusCode == 201) {
                        alert("Error occurred !");
                    }
                }
            });
        } else {
            alert('Please fill all the fields !');
        }
    });

    // Event handler for reply submission
    $('#btnreply').on('click', function() {
        $("#btnreply").attr("disabled", "disabled");
        var id = document.forms["frm1"]["Rcommentid"].value;
        var name = document.forms["frm1"]["Rname"].value;
        var msg = document.forms["frm1"]["Rmsg"].value;
        if (name != "" && msg != "") {
            $.ajax({
                url: "save.php",
                type: "POST",
                data: {
                    id: id,
                    name: name,
                    msg: msg,
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#btnreply").removeAttr("disabled");
                        document.forms["frm1"]["Rcommentid"].value = "";
                        document.forms["frm1"]["Rname"].value = "";
                        document.forms["frm1"]["Rmsg"].value = "";
                        LoadData();
                        closeModal(); // Close the modal after successful submission
                    } else if (dataResult.statusCode == 201) {
                        alert("Error occurred !");
                    }
                }
            });
        } else {
            alert('Please fill all the fields !');
        }
    });
});
</script>
</body>
</html>
