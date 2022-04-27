<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style type="text/css">
    /*REQUIRED*/
    .carousel-row {
        margin-bottom: 10px;
    }
    .slide-row {
        padding: 0;
        background-color: #ffffff;
        min-height: 150px;
        border: 1px solid #e7e7e7;
        overflow: hidden;
        height: auto;
        position: relative;
    }
    .slide-carousel {
        width: 20%;
        float: left;
        display: inline-block;
    }
    .slide-carousel .carousel-indicators {
        margin-bottom: 0;
        bottom: 0;
        background: rgba(0, 0, 0, .5);
    }
    .slide-carousel .carousel-indicators li {
        border-radius: 0;
        width: 20px;
        height: 6px;
    }
    .slide-carousel .carousel-indicators .active {
        margin: 1px;
    }
    .slide-content {
        position: absolute;
        top: 0;
        left: 20%;
        display: block;
        float: left;
        width: 80%;
        max-height: 76%;
        padding: 1.5% 2% 2% 2%;
        overflow-y: auto;
    }
    .slide-content h4 {
        margin-bottom: 3px;
        margin-top: 0;
    }
    .slide-footer {
        position: absolute;
        bottom: 0;
        left: 20%;
        width: 78%;
        height: 20%;
        margin: 1%;
    }
    /* Scrollbars */
    .slide-content::-webkit-scrollbar {
        width: 5px;
    }
    .slide-content::-webkit-scrollbar-thumb:vertical {
        margin: 5px;
        background-color: #999;
        -webkit-border-radius: 5px;
    }
    .slide-content::-webkit-scrollbar-button:start:decrement,
    .slide-content::-webkit-scrollbar-button:end:increment {
        height: 5px;
        display: block;
    }
</style>

<div class="content-wrapper" style="min-height: 946px;">

    <section class="content-header">
        <h1>
            <i class="fa fa-bus"></i> General Ledger</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php $this->load->view('reports/_finance'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">

                    <div class="box-header reportbr"></div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> </h3>
                    </div>
                        <div class="box-body row">
                            <div class="col-sm-6 col-md-6" >
                                <div class="form-group">
                                    <label>Search Account Book</label>
                                    <input onkeyup="autoSuggest()" id="account_title" name="account_title" type="text" class="form-control" value="<?php echo $account_title; ?>" />
                                    <input id="account_id" name="account_id" type="hidden" value="<?php echo $account_id; ?>" /> 
                                    <div id="data-container"></div>
                                    <span class="text-danger"><?php echo form_error('account_title'); ?></span>
                                </div>
                                
                            </div>

                            <div class="col-sm-1 col-md-1" >
                                <label></label>
                                <div class="form-group">
                                    <button type="button" name="search" value="search_filter" id="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right themecolor"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="box-header ptbnull"></div>
                            <div class="box-header reportlabel">
                                <h3 class="box-title titlefix"><i class="fa fa-money"></i> General Ledger</h3>
                            </div>
                        </div>

                </div>
            </div>
        </div>   
</div>  
</section>
</div>
<script>
// AJAX call for autocomplete 
function autoSuggest(){
    if($('#account_title').val().length >= 3){
        var resp_data_format="";
        var path  = '<?php echo base_url('report/autocomplete'); ?>';
        $.ajax({
            method: "POST",
            dataType: "json",
            url: path,
            data:'keyword='+$('#account_title').val(),
            beforeSend: function(){
                ///$("#search_query").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(response){

                resp_data_format+='<ul style="list-style-type: none;">';
                if(response.length > 0){
                    for (var i = 0; i < response.length; i++) {
                        resp_data_format=resp_data_format+'<li><a href="javascript:" id="listid'+response[i].id+'" onclick="setSelectAcc('+response[i].id+')" >'+response[i].account_number+' - '+response[i].account_title+'</a></li>';
                    };
                    resp_data_format+='</ul>';
                    $("#data-container").html(resp_data_format);
                }

            }
        });
    }
}

function setSelectAcc(account_id){
    document.getElementById('account_title').style.border ="1px solid #ccc";
    var account_title = $("#listid"+account_id).html();
    $('#account_title').val(account_title);
    $('#account_id').val(account_id);
    $('#data-container').html('');
} 

$("#search_filter").on('click', function(){
    var account_id = $('#account_id').val();

    if(account_id > 0){
        var path  = '<?php echo base_url('admin/account/accountbook/'); ?>'+account_id;
        window.location = path ;
    }else{
        alert('Please Select Account Book');
        document.getElementById('account_title').style.border ="1px solid red";
    }
    

})
</script>

<script>
<?php
if ($search_type == 'period') {
    ?>

        $(document).ready(function () {
            showdate('period');
        });

    <?php
}
?>

</script>