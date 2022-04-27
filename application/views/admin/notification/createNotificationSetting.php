<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-gears"></i> <?php echo $this->lang->line('system_settings'); ?>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- left column -->
                <form id="form1" action="<?php echo site_url('admin/notification/addnotifications') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                    <div class="box box-primary">
                        <div class="box-header with-border themecolor">
                            <h3 class="box-title"><i class="fa fa-commenting-o"></i> <?php echo $this->lang->line('create_setting'); ?> <?php echo $this->lang->line('notification_setting'); ?></h3>
                        </div>
                        <div class="around10">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <!-- Button HTML (to Trigger Modal) -->
                            <div class="table-responsive">

                                <table class="table table-hover">
                                    <thead>
                                    <th><?php echo $this->lang->line('event'); ?></th>
                                    <th><?php echo $this->lang->line('option'); ?></th>
                                    <th><?php echo $this->lang->line('sample_message'); ?> <small>(You can use variables like {{username}})</small></th>
                                    </thead>
                                    <tbody>

                                            <tr>
                                                <td width="15%">
                                                    <input type="text" name="event_type" value="" class="form-control">
                                                    <?php echo $this->lang->line($note_value->type); ?>
                                                </td>
                                                <td width="25%">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="mail_type" value="mail" > <?php echo $this->lang->line('email'); ?>
                                                    </label>
                                                    
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="mail_type" value="sms" >
                                                            <?php echo $this->lang->line('sms'); ?>
                                                        </label>
                                                        
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="mail_type" value="notification" >
                                                            <?php echo $this->lang->line('mobile_app') ?>
                                                        </label>

                                                </td>
                                                <td width="60%">
                                                    <div class="form-group">
                                                        <textarea id="form_message" name="template_message" class="form-control" rows="7" autocomplete="off"></textarea>
                                                        <div class="text text-danger template_message_error"></div>
                                                        <div class="hide_in_read"><p class=" lead_template_variable">You can use variables</p>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box-footer">
                            <?php if ($this->rbac->hasPrivilege('notification_setting', 'can_edit')) {
                                ?>
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            <?php }
                            ?>

                        </div>
                </form>
            </div>

        </div>
</div><!--./wrapper-->

</section><!-- /.content -->
</div>
<div class="modal fade" id="templateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?php echo site_url('admin/notification/savetemplate') ?>" method="post" id="templateForm">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <?php echo $this->lang->line('template'); ?></h4>
                </div>
                <div class="modal-body template_modal_body">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="template_update btn btn-primary" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing.."><?php echo $this->lang->line('save'); ?></button>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('input[name="mail_type"]').on('change', function() {
        $('input[name="mail_type"]').not(this).prop('checked', false);
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.button_template', function () {
            $('.template_message_error').html("");
            var $this = $(this);
            var id = $this.data('recordId');
            $this.button('loading');
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: baseurl + "admin/notification/gettemplate",
                data: {'id': id},
                beforeSend: function () {
                },
                success: function (data) {
                    if (data.status) {
                        $('#templateModal').modal('show');
                        $('.template_modal_body').html(data.template);

                    }
                },
                error: function (xhr) { // if error occured
                    alert("Error occured.please try again");
                    $this.button('reset');
                },
                complete: function () {
                    $this.button('reset');
                }
            });
        });

    });

    $("#templateForm").submit(function (e) {
        $('.template_message_error').html("");
        var submit_btn = $(this).find("button[type=submit]:focus");
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: form.serialize(), // serializes the form's elements.
            beforeSend: function () {
                submit_btn.button('loading');
            },
            success: function (data) {
                if (data.status) {
                    successMsg(data.message);
                    window.location.reload(true);
                } else {
                    $.each(data.error, function (key, val) {
                        $('.' + key + '_error').html(val);

                    });
                }
            },
            error: function (xhr) { // if error occured
                alert("Error occured.please try again");
                submit_btn.button('reset');
            },
            complete: function () {
                submit_btn.button('reset');
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

</script>