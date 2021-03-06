<script type="text/javascript">
    var today_ymd_str;
    function bring_tournament_info() {
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '<?php echo base_url(); ?>' + "applications/score_prediction/get_team_standings",
            data: {
                tournament_id: $("#dd_tournaments").val()
            },
            success: function (data) {
                $('#pred_table_title').html($("#dd_tournaments option:selected").text());
                $('#tbl_team_standings').html(tmpl('tmpl_table_header'));
                $('#tbl_team_standings').append(tmpl('tmpl_team_standings', data.team_standings));
                //bring_prediction_info();
            }
        });
    }
    function bring_prediction_info() {
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '<?php echo base_url(); ?>' + "applications/score_prediction/get_predictions_for_month",
            data: {
                tournament_id: $("#dd_tournaments").val(),
                current_month: $('#current_month').val(),
                next_month: $('#next_month').val()
            },
            success: function (data) {
                $('#tbl_predictions').html(tmpl('tmpl_predictions', data));
//                console.log(data);
            }
        });
    }

    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    function month_incrim() {
        var in_date = $('#current_month').val();
        var date = new Date(in_date);
        var dd = date.getDate();
        var mm = date.getMonth();
        var yyyy = date.getFullYear();
        mm++;//increment
        if (mm > 11) {
            mm = 0;
            yyyy++
        }
        $('#current_month_heading').html(monthNames[mm] + ", " + yyyy);
        mm++;//inc for date
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var out_date = yyyy + '-' + mm + '-' + dd;
        $('#current_month').val(out_date);
        mm++;//inc for next month
        if (mm > 12) {
            mm = 1;
            yyyy++;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var out_date = yyyy + '-' + mm + '-' + dd;
        $('#next_month').val(out_date);
        bring_prediction_info();
    }
    function month_decrim() {
        var in_date = $('#current_month').val();
        var out_date;
        var date = new Date(in_date);
        var dd = date.getDate();
        var mm = date.getMonth();
        var yyyy = date.getFullYear();
        mm--;
        if (mm < 0) {
            mm = 11;
            yyyy--
        }
        $('#current_month_heading').html(monthNames[mm] + ", " + yyyy);
        mm++;
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var out_date = yyyy + '-' + mm + '-' + dd;
        $('#current_month').val(out_date);
        mm++;//inc for next month
        if (mm > 12) {
            mm = 1;
            yyyy++;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var out_date = yyyy + '-' + mm + '-' + dd;
        $('#next_month').val(out_date);
        bring_prediction_info();
    }
    function date_manage() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        $('#current_month_heading').html(monthNames[mm - 1] + ", " + yyyy);
        dd = 1;
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today_ymd_str = yyyy + '-' + mm + '-' + dd;
        $('#current_month').val(today_ymd_str);
        mm++;//inc for next month
        if (mm > 12) {
            mm = 1;
            yyyy++;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
//        today_ymd_str = yyyy+'-'+mm+'-'+dd;
        $('#next_month').val(yyyy + '-' + mm + '-' + dd);
    }

    function confirmation_vote(match_id, match_status_id) {
        $("#match_id").val(match_id);
        $("#match_status_id").val(match_status_id);
        $("#confirmModal").modal("show");
    }
    function post_vote() {
        var match_id = $("#match_id").val();
        var match_status_id = $("#match_status_id").val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>' + "applications/score_prediction/post_vote",
            dataType: 'json',
            data: {
                match_id: match_id,
                match_status_id: match_status_id
            },
            success: function (data) {
                //alert(data.message);
                var message = data.message;
                print_common_message(message);
                location.reload();
            }
        });
    }
    function pred_pressed(pred_butn) {
        var match_id = ($(pred_butn).data('match_id'));
        $(pred_butn).parent().parent().siblings('tr[id=prediction_' + match_id + ']').toggle("fade", {}, 600);
    }
    function result_pred_pressed(pred_butn) {
        $(pred_butn).parent().parent().next().next().toggle("fade", {}, 600);
//        $(pred_butn).parent().parent().siblings('tr[class=result_prediction]').toggle("fade", {}, 600);
    }
    $(function () {
        date_manage();
        bring_tournament_info();
        bring_prediction_info();
        $("#dd_tournaments").change(function () {
            bring_tournament_info();
            bring_prediction_info();
        });
    });
</script>
<script type="text/x-tmpl" id="tmpl_predictions">
    {% for(var date in o){
    var date_group = o[date];
    %}
    <tr style="background-color: #EAEAEA">
    <th class="title" colspan="4">
    {% 
    var ddate = new Date(date),
    yr = ddate.getFullYear(),
    month = +ddate.getMonth() < 10? '0' + ddate.getMonth() : ddate.getMonth() ,
    day = +ddate.getDate() < 10? '0' + ddate.getDate() : ddate.getDate(),
    newDate = day + ' ' + monthNames[month-0] + ', ' + yr;
    %}{%=newDate%}
    </th>
    </tr>
    {%  for(var index in date_group){  
    var prediction = date_group[index];
    %}
    <tr>
    <td style="text-align: right">{%= prediction['team_title_home']%}</td>
    <td style="text-align: center"> {%= prediction['time']%}</td>
    <td style="text-align: left">{%= prediction['team_title_away']%}</td>
    <td>
    {%
    var mch_date = Date.parse(prediction['date']),
    tdy_date = Date.parse(new Date()),
    match_over = (mch_date>=tdy_date) ? 0: 1,
    mch_time = prediction['time'],
    now_time = new Date().getHours() + ":" + new Date().getMinutes(),match_over;
    if(mch_date>tdy_date){match_over=0}
    else if(mch_date<tdy_date){match_over=1}
    else if(mch_date==tdy_date){if(mch_time > now_time){match_over=0}else{match_over=1}}
    //                    match_over = 0;
    %}
    {% if ( (prediction['can_predict'] == 1) && (match_over==0) ){ %}
    {%=mch_date %} {%="T"+tdy_date %} {%=mch_time %} {%=now_time %}<a data-match_id="{%= prediction['match_id']%}" class="prediction_button" onclick="pred_pressed(this)" style="float: right">Predict<!--<img src="<?php echo base_url(); ?>resources/images/predict_button.png">--></a>
    {% } else { %}
    {%=mch_date %} {%="t"+tdy_date %} {%=mch_time %} {%=now_time %}<a class="prediction_button" onclick="result_pred_pressed(this)" style="float: right"><img src="<?php echo base_url(); ?>resources/images/predict_result_button.png"></a>
    {% } %}
    </td>
    </tr>
    <tr style="display: none" id="prediction_{%= prediction['match_id']%}">
    <td colspan="4">
    <div class="col-md-4">
    <div class="title">{%= prediction['team_title_home']%}</div>
    <div onclick="confirmation_vote({%= prediction['match_id']%}, <?php echo MATCH_STATUS_WIN_HOME ?>)" style="height: 100px; border: 1px solid blue; margin: 20px; background-color: #75B3E6">
    <div style="background-color: white; height: {%= ((1 - prediction['win_home_chance'])*100).toFixed(1) %}%">
    <div class="title" style="padding-top: 25%">{%= ((prediction['win_home_chance'])*100).toFixed(2)  %} %</div>
    </div>
    </div>
    <input type="hidden" id=""value="">
    </div>
    <div class="col-md-4">
    <div class="title">Draw</div>
    <div onclick="confirmation_vote({%= prediction['match_id']%}, <?php echo MATCH_STATUS_DRAW ?>)" style="height: 100px; border: 1px solid blue; margin: 20px; background-color: #75B3E6">
    <div style="background-color: white; height: {%= ((1 - prediction['draw_game_chance'])*100).toFixed(1) %}%">
    <div class="title" style="padding-top: 25%">{%= ((prediction['draw_game_chance'])*100).toFixed(2)  %}%</div>
    </div>
    </div>
    <input type="hidden" id=""value="">
    </div>
    <div class="col-md-4">
    <div class="title">{%= prediction['team_title_away']%}</div>
    <div onclick="confirmation_vote({%= prediction['match_id']%}, <?php echo MATCH_STATUS_WIN_AWAY ?>)" style="height: 100px; border: 1px solid blue; margin: 20px; background-color: #75B3E6">
    <div style="background-color: white; height: {%= ((1 - prediction['win_away_chance'])*100).toFixed(1) %}%">
    <div class="title" style="padding-top: 25%">{%= ((prediction['win_away_chance'])*100).toFixed(2)  %}%</div>
    </div>
    </div>
    <input type="hidden" id=""value="">
    </div>
    </td>
    </tr>

    <!--RESULT SHOW-->
    <tr style="display: none" class="result_prediction">
    <td colspan="4">
    <div class="col-md-4">
    <div class="title">{%= prediction['team_title_home']%}</div>
    <div style="height: 100px; border: 1px solid blue; margin: 20px; background-color: #75B3E6">
    <div style="background-color: white; height: {%= ((1-prediction['win_home_chance'])*100).toFixed(1) %}%">
    <div class="title" style="padding-top: 25%">{%= ((prediction['win_home_chance'])*100).toFixed(2) %} %</div>
    </div>
    </div>
    <input type="hidden" id=""value="">
    </div>
    <div class="col-md-4">
    <div class="title">Draw</div>
    <div style="height: 100px; border: 1px solid blue; margin: 20px; background-color: #75B3E6">
    <div style="background-color: white; height: {%= ((1-prediction['draw_game_chance'])*100).toFixed(1) %}%">
    <div class="title" style="padding-top: 25%">{%= ((prediction['draw_game_chance'])*100).toFixed(2) %}%</div>
    </div>
    </div>
    <input type="hidden" id=""value="">
    </div>
    <div class="col-md-4">
    <div class="title">{%= prediction['team_title_away']%}</div>
    <div style="height: 100px; border: 1px solid blue; margin: 20px; background-color: #75B3E6">
    <div style="background-color: white; height: {%= ((1-prediction['win_away_chance'])*100).toFixed(1) %}%">
    <div class="title" style="padding-top: 25%">{%= ((prediction['win_away_chance'])*100).toFixed(2) %}%</div>
    </div>
    </div>
    <input type="hidden" id=""value="">
    </div>
    </td>
    </tr>

    {%
    }
    }
    %}

</script>
<script type="text/x-tmpl" id="tmpl_table_header">
    <tr style="font-size: 15px; color: whitesmoke; background-color: #000">
    <th>POS</th>
    <th>Team </th>
    <th>P</th>
    <th>GD</th>
    <th>Pts</th>
    </tr>
</script>
<script type="text/x-tmpl" id="tmpl_team_standings">
    {% var i=0, team = ((o instanceof Array) ? o[i++] : o); %}
    {% while(team){ %}
    <tr style="background-color: whitesmoke">
    <td> {%= i%} </td>
    <td> {%= team['team_name']%} </td>
    <td> {%= team['played']%} </td>
    <td> {%= team['gd']%} </td>
    <td> {%= team['point']%} </td>
    </tr>
    {% team = ((o instanceof Array) ? o[i++] : null); %}
    {% } %}
</script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/bootstrap3/css/blog_app.css" />


<div class="container-fluid">
    <div class="row">
        <h1>Fixtures & Results</h1>
        <?php $this->load->view("applications/score_prediction/templates/header_menu"); ?>
        <div class="col-md-offset-2 col-md-8">
            
            
            
            <div class="close_match_result_view_background">
                <div class="row form-group" >
                    <div class="col-md-12">
                        <div class="progress_bar_backgraound">
                            <span class="progress_bar_percentage_text">20%</span>
                            <div class="progress_bar_width_catulate" style="width: 20%;">
                                <span class="progress_bar_content">Tottenham</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group" >
                    <div class="col-md-12">
                        <div class="progress_bar_backgraound">
                            <span class="progress_bar_percentage_text">0%</span>
                            <div class="progress_bar_width_catulate" style="width:0%;">
                                <span class="progress_bar_content">Draw</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group" >
                    <div class="col-md-12">
                        <div class="progress_bar_backgraound">
                            <span class="progress_bar_percentage_text">80%</span>
                            <div class="progress_bar_width_catulate_green" style="width: 80%;">
                                <span class="progress_bar_content">Chelsea</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="close_match_result_view_background">
                <div class="row form-group">
                    <div class="col-md-12">
                        <img class="img-rounded" width="25" height="25" src="<?php echo base_url()?>resources/images/user_male.png">
                        <span style="font-size: 14px; vertical-align: middle;"><a href="<?php echo base_url()?>">Alamgir Kabir</a> made a prediction.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <p style="font-size: 16px; font-weight: bold; text-align: center;">Tottenham vs Chelsea</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9">
                         <p style="font-size: 14px; color: f5f5f5; text-align: center;">Full Time: Tottenham 2 - 3 Chelsea</p>
                    </div>
                </div>
            
            
        </div>
    </div>
</div>
<div class="row form-group"></div>
<div class="row form-group"></div>
<div class="row form-group"></div>
<div class="row form-group"></div>


