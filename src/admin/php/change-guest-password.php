
<div id="editor-container">
    <form id="change-pwd-frm" action="javascript:void(0);" onsubmit="javascript:void(0);">
        <div class="form-fields">
            <ul>
                <li>                
                    <label for="new-pwd">New Password:</label>
                    <input type="text" name="new-pwd" id="new-pwd" />
                </li>

                <li>
                    <label for="re-new-pwd">Retype New Password:</label>
                    <input type="text" name="re-new-pwd" id="re-new-pwd" />
                </li>

                <li>
                    <input type="submit" class="submit ui_btn" id="change-pwd-submit" value="OK" onclick="javascript:void(0);"
						   style="float: left;" />
                    
					<input type="button" class="form-btn ui_btn" id="cancel-pwd-submit" value="Cancel"
						   style="float: left;" />
                </li>
            </ul>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('#cancel-pwd-submit').click(function (){
        $(this).closest('form').find("input[type=password]").val("");
    });
    
    
    $('form#change-pwd-frm').validate({
        rules: {
            'new-pwd': {
                required: true,
                minlength: 8
            },
            're-new-pwd': {
                required: true,
                minlength: 8,
                equalTo: "#new-pwd"
            }

        },
        messages: {
            'new-pwd': {
                required: "New password required",
                minlength: "Password must be at least 8 characters long"
            },
            're-new-pwd': {
                required: "Repeat new password",
                minlength: "Password must be at least 8 characters long",
                equalTo: "Please enter the same password as above"
            }
        }
    });

    $('form#change-pwd-frm').submit(function () {
        if (!$('form#change-pwd-frm').validate().form()) {
            return;
        }

        var data = $(this).serialize() + '&mod_data=update-guest-pwd';
        
        $.ajax({
            type: "POST",
            url: "php/data-modifier.php",
            data: data,
            success: function (msg) {
                CmsCommon.ShowResponseMessage(msg);
            }
        });
    });
</script>
