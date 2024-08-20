<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap User Management Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/accordion@3.0.2/src/accordion.min.js"></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/accordion@3.0.2/src/accordion.min.css" rel="stylesheet"> -->
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 15px;
    background: #299be4;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}
.table-title .btn:hover, .table-title .btn:focus {
    color: #566787;
    background: #f2f2f2;
}
.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}
.table-title .btn span {
    float: left;
    margin-top: 2px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 60px;
}
table.table tr th:last-child {
    width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}	
table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
}
table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
}
table.table td a:hover {
    color: #2196F3;
}
table.table td a.settings {
    color: #2196F3;
}
table.table td a.delete {
    color: #F44336;
}
table.table td i {
    font-size: 19px;
}
table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}
.status {
    font-size: 30px;
    margin: 2px 2px 0 0;
    display: inline-block;
    vertical-align: middle;
    line-height: 10px;
}
.text-success {
    color: #10c469;
}
.text-info {
    color: #62c9e8;
}
.text-warning {
    color: #FFC107;
}
.text-danger {
    color: #ff5b5b;
}
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
@import url('https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');

.pcs:after { content: " pcs"; }
.cur:before { content: "$"; }
.per:after { content: "%"; }

* { box-sizing: border-box; }
body { padding: .2em 2em; }

table {
  width: 100%;
  th { text-align: left; border-bottom: 1px solid #ccc;}
  th, td { padding: .4em; }
}

table.fold-table {
  > tbody {
    > tr.view {
      td, th {cursor: pointer;}
      td:first-child, 
      th:first-child { 
        position: relative;
        padding-left:20px;
        &:before {
          position: absolute;
          top:50%; left:5px;
          width: 9px; height: 16px;
          margin-top: -8px;
          font: 16px fontawesome;
          color: #999;
          content: "\f0d7";
          transition: all .3s ease;
        }
      }
      &:nth-child(4n-1) { background: #eee; }
      &:hover { background: gray; }
      &.open {
        background: gray;
        color: white;
        td:first-child, th:first-child {
          &:before {
            transform: rotate(-180deg);
            color: gray;
          }
        }
      }
    }
    > tr.fold {
      display: none;
      &.open { display:table-row; }
    }
  }

.fold-content {
  padding: .5em;
  h3 { margin-top:0; }
  > table {
    border: 2px solid #ccc;
    > tbody {
      tr:nth-child(even) {
        background: #eee;
      }
    }
  }
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>User <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                        <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>						
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover fold-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invite ID</th>
                        <th>Name</th>						
                        <th>Date Created</th>
                        <th>RSVP</th>
                        <th>Invite link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="users-tbody">
                    <?php 
                    if(!empty($data->all_users))
                    {
                        foreach($data->all_users as $key=> $c)
                            {
                    ?>
                        <tr class="view" data-id="<?php echo $c->id;?>">
                            <td><?php echo $c->id?> </td>
                            <td><?php echo $c->invite_id ?></td>
                            <td><?php echo $c->name ?></td>
                            <td><?php echo $c->date ?></td>                        
                            <td><?php echo ($c->will_attend == NULL ? 'Invitation not yet sent ': $c->will_attend == 'Yes') ? 'Will attend':'Will not attend'?></td>
                            <td><?php echo $c->will_attend == NULL ? '<a class="invite-link" href="'.base_url('rsvp/'.$c->invite_id.'').'">Click to Copy link</a>' : 'N/A' ?> </td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr class="fold">
                            <td colspan = "6">
                            <div class="fold-content" id="companions_<?php echo $c->id?>">
                                <p>Test</p>
                            </div>

                            </td>
                        </tr>
                    <?php
                            }
                    }
                    ?> 
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>     
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
    $("#users-tbody").find('.invite-link').click(function(event) {
    event.preventDefault();
    navigator.clipboard.writeText($(this).attr("href")).then(() => {

        alert("Invite link copied"); 
    });
 });

 $(function(){
  $(".fold-table tr.view").on("click", function(){
    $(this).toggleClass("open").next(".fold").toggleClass("open");
  });
});

$('.fold-table').on('click', 'td', function() {
        var user_id = $(this).parent().data('id');  
        $.ajax({
        url: '<?php echo base_url('admin/companions');?>',
        type: 'POST',
        data: { user_id: user_id },
        dataType: 'json',
        success: function(response) {
            // Check if the response is an array and if it's empty
            if (Array.isArray(response) && response.length === 0) {
                console.log('Response is an empty array.');
                $("#companions_" + user_id).html('<p>No companions found.</p>');
            } else if (typeof response === 'object' && Object.keys(response).length === 0) {
                // Check if the response is an object and if it's empty
                console.log('Response is an empty object.');
                $("#companions_" + user_id).html('<p>No companions found.</p>');
            } else {
                // Handle non-empty response
                console.log('Response:', response);
                
                var html = '<ul>';
                $.each(response, function(index, item) {
                    html += '<li>Name: ' + item.name + '</li>';
                });
                html += '</ul>';

                $("#companions_" + user_id).html(html);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
 });
            
</script>
</body>
</html>