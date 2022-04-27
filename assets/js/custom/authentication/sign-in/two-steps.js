"use strict";
var KTSigninTwoSteps = function() {
    var t, e;
    return {
        init: function() {
            t = document.querySelector("#kt_sing_in_two_steps_form"), (e = document.querySelector("#kt_sing_in_two_steps_submit")).addEventListener("click", (function(n) {
                n.preventDefault();
                var i = !0,
                    o = [].slice.call(t.querySelectorAll('input[maxlength="1"]'));
                o.map((function(t) {
                    "" !== t.value && 0 !== t.value.length || (i = !1)
                })), !0 === i ? (e.setAttribute("data-kt-indicator", "on"), e.disabled = !0, setTimeout((function() {
                    e.removeAttribute("data-kt-indicator"), e.disabled = !1, Swal.fire({
                        text: "You have been successfully verified!",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then((function(e) {
                        if (e.isConfirmed) {

                        	var path = t.getAttribute("data-kt-redirect-url");
                        	//var data = $("#kt_sing_in_two_steps_form").serialize();
                        	var otp_code = '';
                        	o.map((function(t) {
                        		otp_code+=t.value;
                            }));

                        	//console.log(otp_code, path, data); return false;
                        	$.ajax({
                                  method: "POST",
                                  url: path,
                                  dataType: "json",
                                  data: {'otp_password':otp_code},
                                  success: function(data){
                                        if (data.status == "fail") {
                                        	var message = "";
					                        $.each(data.error, function (index, value) {
					                            message += value;
					                        });
                                            Swal.fire("Oooops", message, "warning");
                                        }
                                        if (data.status == "success") {
                                            location.href = data.redirect;
                                        }
                                  }
                            });
                            o.map((function(t) {
                                t.value = ""
                            }));

                            // var n = t.getAttribute("data-kt-redirect-url");
                            // n && (location.href = n)
                        }
                    }))
                }), 1e3)) : swal.fire({
                    text: "Please enter valid securtiy code and try again.",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-light-primary"
                    }
                }).then((function() {
                    KTUtil.scrollTop()
                }))
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTSigninTwoSteps.init()
}));