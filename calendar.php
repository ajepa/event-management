<?php session_start(); ?> 
<?php include "header.php"; ?>
<?php require_once 'dbconfig.php'; ?>
<?php include "user_info.php"; ?>

<?php
  
    $sql = "SELECT book.*, users.nama as name FROM book JOIN users ON users.id = book.user_id WHERE book.approval = 1";

    $result = mysqli_query($con, $sql);

?>

<body style="border: none;">

<div class="row">
    <div class="col-md-12" id="header" style="background: #181818;">
        <?php include "menu.php"; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12"><h3 class="text-center">Sila pilih tarikh tempahan</h3></div>
    <div class="col-md-1"></div>
    <div id="calendar" class="col-md-10"></div>
    <div class="col-md-1"></div>
</div>

<div class="modal modal-fade" id="event-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">
					Event
				</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="event-index">
				<form class="form-horizontal" id="formPick" method="POST" action="booking.php">
					<div class="form-group">
						<label for="min-date" class="col-sm-4 control-label">Nama Program<span class="error-nama-program" style="color: red; visibility: hidden"> * </span></label>
						<div class="col-sm-7">
							<input name="event-name" type="text" class="form-control" id="event-name">
						</div>
					</div>
					<div class="form-group">
						<label for="min-date" class="col-sm-4 control-label">Tempat</label>
						<div class="col-sm-7">
							<select name="location" id="location" class="form-control">
                              <option value="1">Dewan</option>
                              <option value="2">Auditorium</option>
                            </select>
						</div>
					</div>
					<div class="form-group">
						<label for="min-date" class="col-sm-4 control-label">Tarikh</label>
						<div class="col-sm-7">
							<div class="input-group input-daterange" data-provide="datepicker">
								<input name="event-start-date" type="text" class="form-control" value="2012-04-05" id="start_date">
								<span class="input-group-addon">ke</span>
								<input name="event-end-date" type="text" class="form-control" value="2012-04-19" id="end_date">
							</div>
						</div>
					</div>
                    <div class="form-group">
                        <label for="min-date" class="col-sm-4 control-label">Masa Mula</label>
                        <div class="col-sm-7">
                            <select class="form-control col-sm-4" style="width: 60%;" name="masa_guna" id="masa_guna">
                                <option value="" selected="selected">Pilih</option>
                                <option value="8">08.00</option>
                                <option value="9">09.00</option>
                                <option value="10">10.00</option>
                                <option value="11">11.00</option>
                                <option value="12">12.00</option>
                                <option value="1">01.00</option>
                                <option value="2">02.00</option>
                                <option value="3">03.00</option>
                                <option value="4">04.00</option>
                                <option value="5">05.00</option>
                                <option value="6">06.00</option>
                                <option value="7">07.00</option>
                            </select>
                              <select class="form-control col-sm-3" style="width: 30%; margin-left: 30px;" name="ampm1" id="ampm1">
                                <option value="">Pilih</option>
                                <option value="AM" selected="selected">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="min-date" class="col-sm-4 control-label">Masa Akhir</label>
                        <div class="col-sm-7">
                            <select class="form-control col-sm-4" style="width: 60%;" name="masa_pulang" id="masa_pulang">
                                <option value="" selected="selected">Pilih</option>
                                <option value="8">08.00</option>
                                <option value="9">09.00</option>
                                <option value="10">10.00</option>
                                <option value="11">11.00</option>
                                <option value="12">12.00</option>
                                <option value="1">01.00</option>
                                <option value="2">02.00</option>
                                <option value="3">03.00</option>
                                <option value="4">04.00</option>
                                <option value="5">05.00</option>
                                <option value="6">06.00</option>
                                <option value="7">07.00</option>
                            </select>
                              <select class="form-control col-sm-3" style="width: 30%; margin-left: 30px;" name="ampm2" id="ampm2">
                                <option value="">Pilih</option>
                                <option value="AM" selected="selected">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                    </div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" id="save-event">
					Save
				</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {

function editEvent(event) {
    $('#event-modal input[name="event-index"]').val(event ? event.id : '');
    $('#event-modal input[name="event-name"]').val(event ? event.name : '');
    $('#event-modal input[name="event-location"]').val(event ? event.location : '');
    $('#event-modal input[name="event-start-date"]').datepicker('update', event ? event.startDate : '');
    $('#event-modal input[name="event-end-date"]').datepicker('update', event ? event.endDate : '');
    $('#event-modal').modal();
    if($(this).attr("style")){
    	alert('lel');
    }
}



$(function() {
    var currentYear = new Date().getFullYear();

    $('#calendar').calendar({ 
        enableContextMenu: true,
        enableRangeSelection: true,
        selectRange: function(e) {
            editEvent({ startDate: e.startDate, endDate: e.endDate });
        },
        mouseOnDay: function(e) {
            if(e.events.length > 0) {
                var content = '';
                
                for(var i in e.events) {
                    content += '<div class="event-tooltip-content">'
                                    + '<div class="event-name" style="color:' + e.events[i].color + '">' + e.events[i].name + '</div>'
                                    + '<div class="event-location">' + e.events[i].location + '</div>'
                                + '</div>';
                }
            
                $(e.element).popover({ 
                    trigger: 'manual',
                    container: 'body',
                    html:true,
                    content: content
                });
                
                $(e.element).popover('show');
            }
        },
        mouseOutDay: function(e) {
            if(e.events.length > 0) {
                $(e.element).popover('hide');
            }
        },
        dayContextMenu: function(e) {
            $(e.element).popover('hide');
        },
        dataSource: [
        	<?php while($row = $result->fetch_assoc()) { ?>
            <?php 

            $sdate = date("Y-m-d", strtotime($row['start_date']));
            $edate = date("Y-m-d", strtotime($row['end_date']));

            $sdatetime = $sdate . ' 00:00:00';
            $edatetime = $edate . ' 00:00:00';

            ?>
            {
                id: <?php echo $row['id']; ?>,
                name: '<?php echo $row['nama_program']; ?>',
                location: '<?php echo $row['location']; ?>',
                startDate: convertDate('<?php echo $sdatetime; ?>'),
                endDate: convertDate('<?php echo $edatetime; ?>')
            },
            <?php } ?>
        ]
    });
    
    $('#save-event').click(function() {
        //saveEvent();
        
        var today = new Date();
        today.setHours(0,0,0,0);

        if (parseDate($("#start_date").val()) < today || parseDate($("#end_date").val()) < today) {
           alert('Tarikh tempahan telah lepas, sila pilih tarikh lain')
        };

        if($('#event-name').val() == ''){
            $('.error-nama-program').css("visibility", "visible");
            alert("Sila isi nama program!");
        }
        else{
            $.ajax({
                url: "ajax.php",
                data: { 
                    "start_date": $('#start_date').val(), 
                    "end_date": $('#end_date').val(), 
                    "location": $('#location').val(),
                    "masa_guna": $('#masa_guna').val(),
                    "masa_pulang": $('#masa_pulang').val(),
                    "ampm1": $('#ampm1').val(),
                    "ampm2": $('#ampm2').val(), 
                },
                dataType:"html",
                type: "post",
                success: function(data){
                    console.log(data);
                    if(data == 'Available'){
                        $('#formPick').submit();
                    }
                    if(data == 'Booked'){
                        alert("Terdapat tempahan pada tarikh. Sila pilih tarikh lain.")
                    }
                    if(data == 'Date_time_issue'){
                        alert("Sila pilih masa akhir dgn betul.")
                    }
                }
            }); 
        }
        
    });


});

function convertDate(mySQLDate){
	//var mySQLDate = '2015-04-29 10:29:08';
	return new Date(Date.parse(mySQLDate.replace('-','/','g')));
}

function parseDate(s) {
  var b = s.split(/\D/);
  return new Date(b[2], --b[0], b[1]);
}


});
</script>
</html>